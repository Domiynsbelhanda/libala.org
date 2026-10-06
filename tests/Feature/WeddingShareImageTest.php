<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Services\WeddingShareImage;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class WeddingShareImageTest extends TestCase
{
    private string $cacheDirectory;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
        $this->cacheDirectory = sys_get_temp_dir() . '/libala-share-test-' . bin2hex(random_bytes(6));
        config(['sharing.cache_path' => $this->cacheDirectory]);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->cacheDirectory);
        parent::tearDown();
    }

    private function photograph(string $name, int $red = 150): void
    {
        $image = imagecreatetruecolor(300, 600);
        imagefill($image, 0, 0, imagecolorallocate($image, $red, 40, 60));
        ob_start();
        imagepng($image);
        Storage::disk('public')->put($name, ob_get_clean());
        imagedestroy($image);
    }

    public function test_preview_contains_one_absolute_image_url_and_public_jpeg_is_available(): void
    {
        $html = $this->get('/modeles/jardin-de-promesses')->assertOk()->getContent();
        $this->assertSame(1, substr_count($html, 'property="og:image"'));
        $this->assertSame(1, substr_count($html, 'name="twitter:image"'));
        $this->assertStringContainsString(route('share-image.default'), $html);
        $dom = new \DOMDocument;
        @$dom->loadHTML($html);
        $xpath = new \DOMXPath($dom);
        $this->assertSame(1, $xpath->query('/html/head/meta[@property="og:image"]')->length);
        $this->assertSame(1, $xpath->query('/html/head/link[@rel="stylesheet"]')->length);
        $response = $this->get('/partage/mariage.jpg')->assertOk()->assertHeader('Content-Type', 'image/jpeg');
        $size = getimagesize($response->baseResponse->getFile()->getPathname());
        $this->assertSame([1200, 630], [$size[0], $size[1]]);
        $this->assertStringContainsString('public', $response->headers->get('Cache-Control'));
    }

    public function test_portrait_is_centered_without_stretching_and_cached(): void
    {
        $this->photograph('couples/test.png');
        $event = new Event(['couple_photo' => 'couples/test.png']);
        $images = app(WeddingShareImage::class);
        $path = $images->path($event);
        $result = imagecreatefromjpeg($path);
        $center = imagecolorsforindex($result, imagecolorat($result, 600, 315));
        $this->assertEqualsWithDelta(150, $center['red'], 4);
        // A 1:2 portrait fitted into a 582px-tall area is 291px wide.
        $leftEdge = imagecolorsforindex($result, imagecolorat($result, 465, 315));
        $outside = imagecolorsforindex($result, imagecolorat($result, 440, 315));
        $this->assertEqualsWithDelta(150, $leftEdge['red'], 4);
        $this->assertGreaterThan(230, $outside['red']);
        $this->assertLessThan(300000, filesize($path));
        $this->assertSame($path, $images->path($event));
        imagedestroy($result);
    }

    public function test_all_invitation_heads_contain_a_single_valid_share_image(): void
    {
        $event = new Event(['groom_name' => 'Jean', 'bride_name' => 'Marie']);
        $event->reference = 'HEADTEST';
        $invitation = new \App\Models\GuestTable;
        $invitation->setRelation('guest', new \App\Models\Guest(['name' => 'Invité']));
        $views = ['layouts.app', 'layouts.presentation', 'pages.templates.jardin',
            'pages.templates.template_2', 'pages.templates.template_3', 'pages.templates.template_4',
            'pages.templates.template_444', 'pages.templates.template_core', 'pages.templates.lavewell'];

        foreach ($views as $view) {
            $source = file_get_contents(resource_path('views/' . str_replace('.', '/', $view) . '.blade.php'));
            preg_match('/<head>(.*?)<\/head>/s', $source, $matches);
            $html = \Illuminate\Support\Facades\Blade::render('<html><head>' . $matches[1] . '</head><body></body></html>', compact('event', 'invitation'));
            $dom = new \DOMDocument;
            @$dom->loadHTML($html);
            $xpath = new \DOMXPath($dom);
            $this->assertSame(1, $xpath->query('/html/head/meta[@property="og:image"]')->length, $view);
            $this->assertSame(1, substr_count($html, 'name="twitter:image"'), $view);
            $this->assertSame('', trim($xpath->query('/html/body')->item(0)->textContent), $view);
        }
    }

    public function test_replacing_photo_changes_preview_url_even_with_same_filename(): void
    {
        $this->photograph('couples/test.png');
        $event = new Event(['couple_photo' => 'couples/test.png']);
        $event->reference = 'WEDDING';
        $images = app(WeddingShareImage::class);
        $before = $images->url($event);
        $this->photograph('couples/test.png', 220);
        $this->assertNotSame($before, $images->url($event));
    }

    public function test_missing_photo_uses_gallery_then_floral_fallback(): void
    {
        $this->photograph('gallery/test.png');
        $images = app(WeddingShareImage::class);
        $gallery = new Event(['couple_photo' => 'missing.jpg', 'gallery' => ['gallery/test.png']]);
        $primary = new Event(['couple_photo' => 'gallery/test.png']);
        $this->assertSame($images->version($primary), $images->version($gallery));
        $this->assertNotSame($images->version(), $images->version($gallery));
        Storage::disk('public')->put('broken.jpg', 'not an image');
        $this->assertSame($images->version(), $images->version(new Event(['couple_photo' => 'broken.jpg'])));
    }

    public function test_event_image_endpoint_is_public_and_unknown_event_is_not_found(): void
    {
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('couple_photo')->nullable();
        });
        $this->photograph('couples/test.png');
        DB::table('events')->insert(['reference' => 'SHARETEST', 'couple_photo' => 'couples/test.png']);
        $this->get('/partage/mariage/SHARETEST.jpg?v=arbitrary')->assertOk()->assertHeader('Content-Type', 'image/jpeg');
        $this->get('/partage/mariage/UNKNOWN.jpg')->assertNotFound();
    }
}
