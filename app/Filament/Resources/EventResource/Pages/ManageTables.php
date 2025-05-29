<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use Filament\Resources\Pages\Page;

class ManageTables extends Page
{
    protected static string $resource = EventResource::class;

    protected static string $view = 'filament.resources.event-resource.pages.manage-tables';

    public Event $record;

    public function mount($record): void
    {
        $this->record = Event::findOrFail($record);
    }
}
