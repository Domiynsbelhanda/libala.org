<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function event($reference)
    {
        $event = Event::where('reference', $reference)->firstOrFail();

        return view('pages.evenement', compact('event'));
    }
}
