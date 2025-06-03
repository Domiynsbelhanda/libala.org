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
}
