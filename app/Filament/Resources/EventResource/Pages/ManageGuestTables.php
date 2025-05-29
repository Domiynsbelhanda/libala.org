<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\GuestTable;
use App\Models\Table as TableModel;
use App\Models\Guest;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Resources\Pages\Page;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

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
        $assignedGuestIds = DB::table('guest_table')
            ->where('event_id', $this->event->id)
            ->pluck('guest_id')
            ->toArray();

        $remainingCount = Guest::where('event_id', $this->event->id)
            ->whereNotIn('id', $assignedGuestIds)
            ->count();

        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Select::make('table_id')
                            ->label('Table')
                            ->options(function () {
                                return TableModel::where('event_id', $this->event->id)
                                    ->get()
                                    ->filter(function ($table) {
                                        $assignedCount = DB::table('guest_table')
                                            ->where('table_id', $table->id)
                                            ->count();
                                        return $assignedCount < $table->capacity;
                                    })
                                    ->mapWithKeys(function ($table) {
                                        $assignedCount = DB::table('guest_table')->where('table_id', $table->id)->count();
                                        $remaining = $table->capacity - $assignedCount;
                                        return [$table->id => $table->name . " ({$remaining} places restantes)"];
                                    });
                            })
                            ->required(),

                        Select::make('guest_id')
                            ->label("Invité ({$remainingCount} restant" . ($remainingCount > 1 ? 's' : '') . ')')
                            ->searchable()
                            ->options(function () {
                                $assignedGuestIds = DB::table('guest_table')
                                    ->where('event_id', $this->event->id)
                                    ->pluck('guest_id')
                                    ->toArray();

                                return Guest::where('event_id', $this->event->id)
                                    ->whereNotIn('id', $assignedGuestIds)
                                    ->pluck('name', 'id');
                            })
                            ->preload()
                            ->required()
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
