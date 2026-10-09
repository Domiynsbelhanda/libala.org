<?php
namespace Tests\Feature;

use App\Models\{CivilWedding, CivilGuest, CivilTemplate, Event, User};
use App\Filament\Resources\CivilWeddingResource;
use App\Filament\Resources\CivilWeddingResource\Pages\EditCivilWedding;
use App\Filament\Resources\CivilWeddingResource\RelationManagers\GuestsRelationManager;
use App\Services\CivilInvitationImage;
use Database\Seeders\CivilWeddingSeeder;
use Illuminate\Support\Facades\{Artisan, DB, File};
use Livewire\Livewire;
use Tests\TestCase;

class CivilWeddingTest extends TestCase
{
    private string $cacheDirectory;

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        Artisan::call('migrate', ['--force' => true]);
        $this->cacheDirectory = sys_get_temp_dir() . '/civil-tests-' . bin2hex(random_bytes(6));
        config(['sharing.civil_cache_path' => $this->cacheDirectory]);
        $this->seed(CivilWeddingSeeder::class);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->cacheDirectory);
        // Livewire keeps this flag across requests in the test process.
        \Livewire\Features\SupportDisablingBackButtonCache\SupportDisablingBackButtonCache::$disableBackButtonCache = false;
        parent::tearDown();
    }

    private function event(): Event
    {
        return Event::withoutEvents(fn () => Event::forceCreate([
            'reference' => bin2hex(random_bytes(6)), 'password' => bcrypt('test-only'),
            'groom_name' => 'Simon', 'bride_name' => 'Flore', 'wedding_date' => '2027-06-19',
            'manager_name' => 'Test', 'manager_contact' => 'Test',
            'civil_date' => '2027-06-18', 'civil_time' => '14:00', 'civil_commune' => 'Maison communale',
        ]));
    }

    private function ready(): CivilWedding
    {
        $wedding = CivilWedding::first();
        $wedding->update(['event_id' => $this->event()->id, 'date' => '2027-06-18', 'time' => '14:00', 'venue' => 'Maison communale']);
        return $wedding->fresh(['event', 'template']);
    }

    public function test_seed_is_repeatable_and_does_not_touch_normal_guests(): void
    {
        $codes = CivilGuest::pluck('code', 'name')->all();
        CivilWedding::first()->update(['name' => 'Civil renommé']);
        $this->seed(CivilWeddingSeeder::class);
        $this->assertSame(30, CivilGuest::count());
        $this->assertSame(1, CivilWedding::count());
        $this->assertSame('Civil renommé', CivilWedding::first()->name);
        $this->assertSame($codes, CivilGuest::pluck('code', 'name')->all());
        $this->assertSame(0, \App\Models\Guest::count());
        $this->assertSame(0, Event::count());
    }

    public function test_draft_is_not_public_and_preview_works(): void
    {
        $wedding = CivilWedding::first(); $guest = $wedding->guests()->where('name', 'Naomi & Mariam')->firstOrFail();
        $this->get(route('civil.invitation', [$wedding->reference, $guest->code]))->assertNotFound();
        $this->get(route('civil.preview'))->assertOk()->assertSee('Naomi &amp; Mariam', false)->assertSee('Mariage civil');
    }

    public function test_invitation_image_and_sharing_are_personalized_and_scoped(): void
    {
        $wedding = $this->ready(); $guest = $wedding->guests()->where('name', 'Naomi & Mariam')->firstOrFail();
        $this->get($guest->invitationUrl())->assertOk()->assertSee('Simon &amp; Flore', false)->assertSee('Naomi &amp; Mariam', false)->assertSee('og:image', false);
        $url = route('civil.image', [$wedding->reference, $guest->code]);
        $response = $this->get($url)->assertOk()->assertHeader('Content-Type', 'image/jpeg');
        $size = getimagesize($response->baseResponse->getFile()->getPathname());
        $this->assertSame([1000,1500], [$size[0],$size[1]]);
        $this->get(route('civil.share', [$wedding->reference, $guest->code]))->assertOk()->assertSee('Télécharger l’image')->assertSee('navigator.share', false);
        $this->assertStringContainsString('Naomi & Mariam', urldecode($guest->whatsappUrl()));
        $this->assertStringContainsString('2027', $guest->shareText());
        $other = CivilWedding::create(['name'=>'Autre civil','event_id'=>$wedding->event_id,'civil_template_id'=>$wedding->civil_template_id,'date'=>'2027-06-18','time'=>'14:00','venue'=>'Autre']);
        $this->get(route('civil.invitation', [$other->reference, $guest->code]))->assertNotFound();
        $before = app(CivilInvitationImage::class)->version($wedding, $guest);
        $guest->name = 'Autre nom';
        $this->assertNotSame($before, app(CivilInvitationImage::class)->version($wedding, $guest));
    }

    public function test_photo_is_layered_and_replacing_it_refreshes_share_images(): void
    {
        \Illuminate\Support\Facades\Storage::fake('public');
        $disk = \Illuminate\Support\Facades\Storage::disk('public');
        $disk->put('couples/test.png', file_get_contents(public_path('core/images/couple-1.jpg')));
        $wedding = $this->ready();
        $wedding->event->update(['couple_photo' => 'couples/test.png']);
        $guest = $wedding->guests()->first();
        $images = app(CivilInvitationImage::class);
        $before = $images->version($wedding, $guest);
        $this->get($guest->invitationUrl())->assertOk()->assertSee('civil-card--photo');
        $response = $this->get(route('civil.photo', [$wedding->reference, $guest->code]))->assertOk();
        $size = getimagesize($response->baseResponse->getFile()->getPathname());
        $original = getimagesize(public_path('core/images/couple-1.jpg'));
        $this->assertSame([$original[0], $original[1]], [$size[0], $size[1]]);

        $scene = $this->get(route('civil.scene', [$wedding->reference, $guest->code]))->assertOk()->assertHeader('Content-Type', 'image/jpeg');
        $this->assertSame(1000, getimagesize($scene->baseResponse->getFile()->getPathname())[0]);
        $this->get(route('civil.image', [$wedding->reference, $guest->code]))->assertOk();
        $disk->put('couples/test.png', file_get_contents(public_path('templates/civil-ambre/background.png')));
        $this->assertNotSame($before, $images->version($wedding, $guest));
        $this->get(route('civil.scene', [$wedding->reference, 'invalid']))->assertNotFound();
    }

    public function test_whatsapp_contains_the_entire_personalized_message(): void
    {
        $wedding = $this->ready();
        $wedding->event->update(['groom_name' => 'Sylva', 'bride_name' => 'Félicité']);
        $wedding->update(['date' => '2026-10-10', 'time' => '14:00', 'venue' => 'Lubumbashi', 'address' => null]);
        $guest = $wedding->guests()->where('name', 'Naomi & Mariam')->firstOrFail();
        $expected = "Invitation au mariage civil de Sylva & Félicité\n\nÀ l’attention de : Naomi & Mariam\nsamedi 10 octobre 2026 à 14:00\nLubumbashi\n\nNous serions heureux de vous avoir à nos côtés.\n" . $guest->invitationUrl();
        parse_str(parse_url($guest->whatsappUrl(), PHP_URL_QUERY), $query);
        $this->assertSame($expected, $query['text']);
        $this->get(route('civil.share', [$wedding->reference, $guest->code]))
            ->assertOk()->assertSee($guest->whatsappUrl(), false)->assertSee('id="share-whatsapp"', false);
    }

    public function test_scrolling_invitation_separates_cover_guest_and_theme(): void
    {
        $wedding = $this->ready();
        $wedding->update(['theme_title' => 'Chocolat & ivoire', 'theme_image' => 'civil-themes/palette.jpg']);
        $guest = $wedding->guests()->first();
        $response = $this->get($guest->invitationUrl())->assertOk();
        $response->assertSeeInOrder(['Invitation Mariage Civil', 'Maison communale', 'guest-name', 'theme-title', 'theme-image']);
        $response->assertSee('Chocolat &amp; ivoire', false);
        preg_match('/<header.*?<\/header>/s', $response->getContent(), $cover);
        $this->assertStringNotContainsString('id="guest-name"', $cover[0]);
        $wedding->update(['theme_image' => null]);
        $this->get($guest->invitationUrl())->assertDontSee('id="theme-title"', false);
    }

    public function test_theme_image_is_served_from_upload_without_public_storage_link(): void
    {
        \Illuminate\Support\Facades\Storage::fake('public');
        $disk = \Illuminate\Support\Facades\Storage::disk('public');
        $disk->put('civil-themes/theme.jpg', file_get_contents(public_path('core/images/couple-1.jpg')));
        $wedding = $this->ready();
        $wedding->update(['theme_image' => 'civil-themes/theme.jpg']);
        $guest = $wedding->guests()->first();
        $url = route('civil.theme-image', [$wedding->reference, $guest->code], false);
        $this->get($url)->assertOk()->assertHeader('Content-Type', 'image/jpeg');
        $this->get($guest->invitationUrl())->assertSee('src="' . $url . '"', false);
        $this->get(route('civil.theme-image', [$wedding->reference, 'invalid']))->assertNotFound();
        $wedding->update(['theme_image' => '../outside.jpg']);
        $this->get($url)->assertNotFound();
        $wedding->update(['theme_image' => 'civil-themes/missing.jpg']);
        $this->get($url)->assertNotFound();
    }

    public function test_new_admin_resource_requires_authentication_and_scopes_managers(): void
    {
        $wedding = $this->ready();
        $this->get('/admin/civil-weddings')->assertForbidden();
        $this->assertFalse(CivilWeddingResource::canEdit($wedding));
        $this->actingAs($this->event(), 'event_manager');
        $this->assertFalse(CivilWeddingResource::canEdit($wedding));
        $this->assertSame(0, CivilWeddingResource::getEloquentQuery()->count());
        $this->actingAs($wedding->event, 'event_manager');
        $this->assertTrue(CivilWeddingResource::canEdit($wedding));
        $this->assertSame(1, CivilWeddingResource::getEloquentQuery()->count());
    }

    public function test_admin_can_link_and_rename_draft_and_manage_its_guests(): void
    {
        $this->actingAs(User::factory()->create());
        $event = $this->event(); $wedding = CivilWedding::first();
        Livewire::test(EditCivilWedding::class, ['record' => $wedding->id])
            ->fillForm(['name'=>'Civil Simon & Flore','event_id'=>$event->id,'civil_template_id'=>CivilTemplate::first()->id,'date'=>'2027-06-18','time'=>'14:00','venue'=>'Maison communale','address'=>'Salle 1'])
            ->call('save')->assertHasNoFormErrors();
        $this->assertTrue($wedding->fresh()->isReady());
        Livewire::test(GuestsRelationManager::class, ['ownerRecord'=>$wedding->fresh(), 'pageClass'=>EditCivilWedding::class])
            ->set('tableRecordsPerPage', 50)
            ->assertCanSeeTableRecords($wedding->guests()->get())
            ->callTableAction('edit', $wedding->guests()->where('name', 'Naomi & Mariam')->firstOrFail(), data: ['name'=>'Naomi & Mariam', 'phone'=>'+243123456789'])
            ->assertHasNoTableActionErrors();
    }
}
