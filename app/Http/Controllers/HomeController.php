<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\GuestTable;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

        return view('pages.templates.template_2',
            ['event'=>$event, 'invitation'=>$invitation,
                'qrcode' => QrCode::size(200)->generate($invitationUrl),
            ]
        );
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

}
