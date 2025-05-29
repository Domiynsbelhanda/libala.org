<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\GuestTable;
use App\Models\Table as TableModel;
use App\Models\Guest;
use App\Models\Event;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Pages\Page;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class ManageGuestTables extends Page implements Forms\Contracts\HasForms, Tables\Contracts\HasTable
{
    use Forms\Concerns\InteractsWithForms;
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = EventResource::class;
    protected static string $view = 'filament.resources.event-resource.pages.manage-guest-tables';

    public string|int $record;
    public Event $event;

    public array $data = [];

    public function mount($record): void
    {
        $this->record = $record;
        $this->event = Event::findOrFail($record);
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('table_id')
                            ->label('Table')
                            ->options(TableModel::where('event_id', $this->event->id)->pluck('name', 'id'))
                            ->required(),

                        Forms\Components\Select::make('guest_id')
                            ->label('Invité')
                            ->searchable()
                            ->options(Guest::where('event_id', $this->event->id)->pluck('name', 'id'))
                            ->required(),
                    ]),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        GuestTable::create([
            'event_id' => $this->event->id,
            'guest_id' => $this->data['guest_id'],
            'table_id' => $this->data['table_id'],
        ]);

        $this->form->fill();

        Notification::make()
            ->title('Invité assigné à la table')
            ->success()
            ->send();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                GuestTable::query()
                    ->with(['guest', 'table'])
                    ->where('event_id', $this->event->id)
                    ->orderBy('table_id')
            )
            ->columns([
                Tables\Columns\TextColumn::make('table.name')->label('Table'),
                Tables\Columns\TextColumn::make('guest.name')->label('Invité'),
                Tables\Columns\TextColumn::make('guest.phone')->label('Téléphone'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('table_id')
                    ->label('Filtrer par table')
                    ->options(
                        TableModel::where('event_id', $this->event->id)->pluck('name', 'id')
                    ),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public function getTitle(): string
    {
        return 'Invités par table';
    }

    public function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('Retour à l’événement')
                ->label('Modifier le mariage')
                ->url(route('filament.admin.resources.events.edit', ['record' => $this->event->id]))
                ->icon('heroicon-o-arrow-left')
                ->color('gray'),
        ];
    }
}
