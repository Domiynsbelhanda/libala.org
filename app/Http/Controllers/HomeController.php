<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\GuestTable;
use App\Models\Template;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function event($reference)
    {
        $event = Event::where('reference', $reference)->firstOrFail();

        return view('pages.evenement', compact('event'));
    }


    public function invitation($reference, $code)
    {
        $event = Event::where('reference', $reference)->firstOrFail();
        $invitation = GuestTable::where('code', $code)->firstOrFail();
        $invitationUrl = route('event.invitation', ['reference' => $reference, 'code' => $code]);

        $bladePath = $event->template?->blade_path ?? 'pages.templates.template_2';

        return view($bladePath,
            ['event'=>$event, 'invitation'=>$invitation,
                'qrcode' => QrCode::size(200)->generate($invitationUrl),
            ]
        );
    }

    public function invitationImage($reference, $code)
    {
        $event = Event::where('reference', $reference)->firstOrFail();
        $invitation = GuestTable::where('code', $code)->firstOrFail();
        $invitationUrl = route('event.invitation', ['reference' => $reference, 'code' => $code]);

        $bladePath = 'pages.templates.image';

        return view($bladePath,
            ['event'=>$event, 'invitation'=>$invitation,
                'qrcode' => QrCode::size(280)->generate($invitationUrl),
            ]
        );
    }


    public function generateInvitationImage(string $reference, string $code)
    {
        $url = route('event.invitation.image', ['reference' => $reference, 'code' => $code]);

        $filename = "invitations/{$reference}_{$code}.png";

        if (!Storage::disk('public')->exists($filename)) {
            Browsershot::url($url)
                ->setChromePath('C:\Users\TON_NOM\AppData\Local\Google\Chrome\Application\chrome.exe')
                ->windowSize(1000, 1000)
                ->waitUntilNetworkIdle()
                ->setScreenshotType('png')
                ->setOption('dumpio', true)
                ->save(Storage::disk('public')->path($filename));
        }

        return response()->file(Storage::disk('public')->path($filename));
    }

    public function rsvp(Request $request, $reference, $code)
    {
        $request->validate([
            'is_attending' => 'required|boolean',
            'number_of_people' => 'required|integer|min:1|max:10',
            'additional_info' => 'nullable|string|max:1000',
        ]);

        $guestTable = GuestTable::where('code', $code)
            ->whereHas('event', fn ($q) => $q->where('reference', $reference))
            ->firstOrFail();

        $update = $guestTable->update([
            'is_attending' => $request->is_attending,
            'number_of_people' => $request->number_of_people,
            'additional_info' => $request->additional_info,
        ]);

        return back()->with('success', 'Votre confirmation a été enregistrée. Merci pour votre réponse !');
    }

    public function template()
    {
        $templates = Template::latest()->get();
        return view('pages.templates.template', compact('templates'));
    }


    public function template_detail($code)
    {
        $event = Event::where('reference', "CQ6QUMA64F")->firstOrFail();
        $invitation = GuestTable::where('code', "8842AF1F33EB")->firstOrFail();
        $invitationUrl = route('event.invitation', ['reference' => "CQ6QUMA64F", 'code' => "8842AF1F33EB"]);
        $template = Template::where('code', $code)->firstOrFail();

        return view($template->blade_path,
            ['event'=>$event, 'invitation'=>$invitation,
                'qrcode' => QrCode::size(200)->generate($invitationUrl),
            ]
        );
    }

}
