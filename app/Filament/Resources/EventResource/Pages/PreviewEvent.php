<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use App\Models\Table as TableModel;
use Filament\Resources\Pages\Page;

class PreviewEvent extends Page
{
    protected static string $resource = EventResource::class;

    protected static string $view =
        'filament.resources.event-resource.pages.preview-event';

    public string|int $record;

    public Event $event;

    public function mount($record): void
    {
        $this->record = $record;
        $this->event = Event::findOrFail($record);
    }

    protected function getViewData(): array
    {
        $tables = TableModel::query()
            ->where('event_id', $this->event->id)
            ->with([
                'guestTables' => fn ($query) => $query
                    ->with('guest')
                    ->orderBy('id'),
            ])
            ->orderBy('name')
            ->get();

        return compact('tables');
    }

    public function getTitle(): string
    {
        return 'Prévisualisation des tables';
    }
}
