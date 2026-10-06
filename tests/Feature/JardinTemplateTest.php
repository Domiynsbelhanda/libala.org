<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Guest;
use App\Models\GuestTable;
use App\Models\Table;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class JardinTemplateTest extends TestCase
{
    public function test_preview_is_available_without_event_records(): void
    {
        $this->get('/modeles/jardin-de-promesses')
            ->assertOk()
            ->assertSee('Jardin de promesses')
            ->assertSee('Gabriel')
            ->assertSee('Eliana')
            ->assertSee('Les réponses ne sont pas envoyées.');
    }

    public function test_invitation_renders_personal_details_and_existing_rsvp_values(): void
    {
        $event = new Event(['groom_name' => 'Jean', 'bride_name' => 'Marie']);
        $event->reference = 'DEMOEVENT';
        $invitation = new GuestTable([
            'code' => 'DEMOCODE',
            'is_attending' => false,
            'number_of_people' => 2,
            'additional_info' => '<script>alert(1)</script>',
        ]);
        $invitation->setRelation('guest', new Guest(['name' => 'Famille Exemple']));
        $invitation->setRelation('table', new Table(['name' => 'Roses']));

        $html = view('pages.templates.jardin', [
            'event' => $event,
            'invitation' => $invitation,
            'qrcode' => '<svg aria-label="test-qr"></svg>',
            'errors' => new ViewErrorBag,
        ])->render();

        $this->assertStringContainsString('Famille Exemple', $html);
        $this->assertStringContainsString('Table Roses', $html);
        $this->assertStringContainsString('/evenement/DEMOEVENT/invitation/DEMOCODE/rsvp', $html);
        $this->assertStringContainsString('value="0" checked', $html);
        $this->assertStringContainsString('value="2" selected', $html);
        $this->assertStringContainsString('&lt;script&gt;', $html);
        $this->assertStringNotContainsString('<script>alert(1)</script>', $html);
        $this->assertStringContainsString('<svg aria-label="test-qr"></svg>', $html);
        $this->assertStringNotContainsString('id="programme-title"', $html);
    }
}
