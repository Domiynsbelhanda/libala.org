<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;

class EventLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'reference' => 'required',
            'password' => 'required',
        ]);

        $event = Event::where('reference', $request->reference)->first();

        if (!$event || !Hash::check($request->password, $event->password)) {
            return back()->withErrors(['reference' => 'Identifiants invalides.']);
        }

        Auth::guard('event_manager')->login($event);
        return redirect()->route('filament.admin.resources.events.edit', ['record' => $event->id]);
    }

    public function logout()
    {
        Auth::guard('event_manager')->logout();
        return redirect()->route('event.login.form');
    }
}
