<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\WeddingShareImage;

class ShareImageController extends Controller
{
    public function show(WeddingShareImage $images, ?string $reference = null)
    {
        $event = $reference ? Event::where('reference', $reference)->firstOrFail() : null;

        return response()->file($images->path($event), [
            'Content-Type' => 'image/jpeg',
            'Cache-Control' => 'public, max-age=3600',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
