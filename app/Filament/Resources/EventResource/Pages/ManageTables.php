<?php

    namespace App\Filament\Resources\EventResource\Pages;

    use App\Filament\Resources\EventResource;
    use App\Models\Event;
    use Filament\Forms;
    use Filament\Notifications\Notification;
    use Filament\Resources\Pages\Page;
    use Filament\Tables;
    use Filament\Forms\Form;
    use Filament\Tables\Table;
    use Filament\Tables\Actions\CreateAction;
    use App\Models\Table as TableModel;
    use Filament\Actions\Action;

class ManageTables extends Page implements Forms\Contracts\HasForms, Tables\Contracts\HasTable
{
    use Forms\Concerns\InteractsWithForms;
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = EventResource::class;
    protected static string $view = 'filament.resources.event-resource.pages.manage-tables';

    public string|int $record;
    public Event $event;

    public function mount($record): void
    {
        $this->record = $record;
        $this->event = Event::findOrFail($record);
        $this->form->fill();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(TableModel::query()->where('event_id', $this->event->id))
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nom de la table')->searchable(),
                Tables\Columns\TextColumn::make('capacity')->label('Capacité'),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y à H:i'),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Nom de la table')
                                ->required(),

                            Forms\Components\TextInput::make('capacity')
                                ->label('Capacité')
                                ->numeric()
                                ->minValue(1),
                        ]),
                    ]),

            ])->headerActions([
                CreateAction::make()
                    ->label('Ajouter une table')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['event_id'] = $this->event->id;
                        return $data;
                    })
                    ->form([
                        Forms\Components\Grid::make(2)->schema([ // ✅ CORRECT
                            Forms\Components\TextInput::make('name')
                                ->label('Nom de la table')
                                ->required(),

                            Forms\Components\TextInput::make('capacity')
                                ->label('Capacité')
                                ->numeric()
                                ->minValue(1),
                        ]),
                    ]),
            ])
            ;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom de la table')
                        ->required(),

                    Forms\Components\TextInput::make('capacity')
                        ->label('Capacité')
                        ->numeric()
                        ->minValue(1),
                ]),
            ])
            ->statePath('data');
    }

    public array $data = [];

    public function create(): void
    {
        $this->validate();
        TableModel::create([
            'name' => $this->data['name'],
            'capacity' => $this->data['capacity'],
            'event_id' => $this->event->id,
        ]);

        $this->form->fill(); // reset le formulaire

        Notification::make()
            ->title('Table ajoutée avec succès.')
            ->success()
            ->send();
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('Retour à l\'événement')
                ->label('↩️ Voir l\'événement')
                ->url(route('filament.admin.resources.events.edit', ['record' => $this->event->id])) // ou 'id' si tu utilises ID
                ->color('secondary')
                ->icon('heroicon-o-arrow-left'),
            ...parent::getHeaderActions(),
        ];
    }
}
