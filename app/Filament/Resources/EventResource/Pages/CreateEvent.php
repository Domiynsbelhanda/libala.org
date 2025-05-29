<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    public function mount(): void
    {
        if (auth()->guard('event_manager')->check()) {
            redirect()->route('event.login.form');
        }

        parent::mount();
    }
}
