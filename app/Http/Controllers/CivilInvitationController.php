<?php
namespace App\Http\Controllers;

use App\Models\CivilWedding;
use App\Models\CivilGuest;
use App\Models\CivilTemplate;
use App\Models\Event;
use App\Services\CivilInvitationImage;

class CivilInvitationController extends Controller
{
    private function resolve(string $reference, string $code): array
    {
        $wedding = CivilWedding::with(['event', 'template'])->where('reference', $reference)->firstOrFail();
        abort_unless($wedding->isReady(), 404);
        $guest = $wedding->guests()->where('code', $code)->firstOrFail();
        $guest->setRelation('wedding', $wedding);
        abort_unless($wedding->template?->key === 'ambre', 404);
        return [$wedding, $guest];
    }

    public function show(string $reference, string $code)
    {
        [$wedding, $guest] = $this->resolve($reference, $code);
        return response()->view('civil.ambre', compact('wedding', 'guest'))->header('Referrer-Policy', 'no-referrer');
    }

    public function image(CivilInvitationImage $images, string $reference, string $code)
    {
        [$wedding, $guest] = $this->resolve($reference, $code);
        return response()->file($images->path($wedding, $guest), [
            'Content-Type' => 'image/jpeg', 'Cache-Control' => 'public, max-age=3600', 'X-Content-Type-Options' => 'nosniff',
        ]);
    }

    public function share(string $reference, string $code)
    {
        [$wedding, $guest] = $this->resolve($reference, $code);
        return view('civil.share', compact('wedding', 'guest'));
    }

    private function sample(): array
    {
        $wedding = new CivilWedding(['name' => 'Mariage civil', 'date' => '2027-06-19', 'time' => '14:00', 'venue' => 'Maison communale', 'address' => 'Salle des mariages']);
        $wedding->setRelation('event', new Event(['groom_name' => 'Gabriel', 'bride_name' => 'Eliana']));
        $wedding->setAttribute('is_design_preview', true);
        $wedding->setRelation('template', new CivilTemplate(['key' => 'ambre']));
        $guest = new CivilGuest(['name' => 'Naomi & Mariam']);
        return [$wedding, $guest];
    }

    public function photo(CivilInvitationImage $images, string $reference, string $code)
    {
        [$wedding] = $this->resolve($reference, $code);
        return response()->file($images->photoPath($wedding), ['Content-Type' => 'image/jpeg']);
    }

    public function previewPhoto(CivilInvitationImage $images)
    {
        [$wedding] = $this->sample();
        return response()->file($images->photoPath($wedding), ['Content-Type' => 'image/jpeg']);
    }

    public function scene(CivilInvitationImage $images, string $reference, string $code)
    {
        [$wedding] = $this->resolve($reference, $code);
        return response()->file($images->scenePath($wedding), ['Content-Type' => 'image/jpeg', 'Cache-Control' => 'public, max-age=3600']);
    }

    public function previewScene(CivilInvitationImage $images)
    {
        [$wedding] = $this->sample();
        return response()->file($images->scenePath($wedding), ['Content-Type' => 'image/jpeg']);
    }

    public function preview()
    {
        [$wedding, $guest] = $this->sample();
        return view('civil.ambre', ['wedding' => $wedding, 'guest' => $guest, 'preview' => true]);
    }

    public function previewImage(CivilInvitationImage $images)
    {
        [$wedding, $guest] = $this->sample();
        return response()->file($images->path($wedding, $guest), ['Content-Type' => 'image/jpeg']);
    }
}
