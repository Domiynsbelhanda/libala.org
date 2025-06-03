<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use App\Models\Guest;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;

class ManageGuests extends Page implements HasForms, HasTable
{
    use Forms\Concerns\InteractsWithForms;
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = EventResource::class;
    protected static string $view = 'filament.resources.event-resource.pages.manage-guests';

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
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label("Nom de l'invité")
                        ->required(),
                    Forms\Components\TextInput::make('phone')
                        ->label('Téléphone')
                        ->tel(),
                ]),
            ])
            ->statePath('data');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Guest::query()->where('event_id', $this->event->id))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Téléphone')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y à H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('name')->label('Nom')->required(),
                            Forms\Components\TextInput::make('phone')->label('Téléphone'),
                        ])
                    ]),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([]);
    }

    public function create(): void
    {
        $guestCount = Guest::where('event_id', $this->event->id)->count();

        if ($this->event->max_guests !== null && $guestCount >= $this->event->max_guests) {
            Notification::make()
                ->title('Nombre limite atteint')
                ->body('Impossible d’ajouter un autre invité, la limite est atteinte.')
                ->danger()
                ->send();

            return;
        }

        Guest::create([
            'name' => $this->data['name'],
            'phone' => $this->data['phone'],
            'event_id' => $this->event->id,
        ]);

        $this->form->fill();

        Notification::make()
            ->title('Invité ajouté avec succès')
            ->success()
            ->send();
    }


    public function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('Retour à l’événement')
                ->label('Retour')
                ->url(route('filament.admin.resources.events.edit', ['record' => $this->event->id]))
                ->icon('heroicon-o-arrow-left')
                ->color('gray'),
        ];
    }

    public function getTitle(): string
    {
        $total = $this->event->max_guests ?? '∞';
        $current = $this->event->guests()->count();

        return "Gestion des invités ($current/$total)";
    }

}
