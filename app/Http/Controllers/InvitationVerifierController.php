<?php

namespace App\Http\Controllers;

use App\Models\GuestTable;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvitationVerifierController extends Controller
{
    public function form()
    {
        return view('invitation.verify');
    }

    public function verify(Request $request)
    {
        $code = $request->input('code');

        $invitation = GuestTable::with(['guest', 'event', 'table'])
            ->where('code', $code)
            ->first();

        if (! $invitation) {
            return view('invitation.verify', [
                'error' => 'Invitation Non Trouvée ou Code mal écris, veuillez reesayer ou contacter l\'organisateur.',
            ]);
        }

        if ($invitation->arrival_time) {
            // Conversion explicite en Carbon au cas où ce n’est pas casté automatiquement
            $heure = Carbon::parse($invitation->arrival_time)->format('H:i');

            return view('invitation.result', [
                'message' => "Cet invité est déjà entré à $heure.",
                'invitation' => $invitation,
            ]);
        }

        // Enregistrement de l'heure d'arrivée actuelle
        $invitation->update([
            'arrival_time' => now(),
        ]);

        return view('invitation.result', [
            'message' => "Bienvenue ! Heure d'arrivée enregistrée.",
            'invitation' => $invitation,
        ]);
    }
}
