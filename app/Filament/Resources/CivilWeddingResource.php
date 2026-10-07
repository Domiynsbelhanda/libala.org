<?php
namespace App\Filament\Resources;

use App\Filament\Resources\CivilWeddingResource\Pages;
use App\Filament\Resources\CivilWeddingResource\RelationManagers\GuestsRelationManager;
use App\Models\CivilWedding;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CivilWeddingResource extends Resource
{
    protected static ?string $model = CivilWedding::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Mariages civils';
    protected static ?string $modelLabel = 'mariage civil';
    protected static ?string $pluralModelLabel = 'mariages civils';
    protected static ?int $navigationSort = 2;

    public static function canViewAny(): bool { return auth('web')->check() || auth('event_manager')->check(); }
    public static function canCreate(): bool { return static::canViewAny(); }
    public static function canEdit(Model $record): bool
    {
        return auth('web')->check() || (auth('event_manager')->check() && (int) $record->event_id === (int) auth('event_manager')->id());
    }
    public static function canDelete(Model $record): bool { return static::canEdit($record); }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['event', 'template'])
            ->when(!auth('web')->check(), fn ($q) => $q->where('event_id', auth('event_manager')->id() ?? -1));
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Votre mariage civil')
                ->description('Une fiche indépendante, reliée à votre mariage principal. Les invités de cette fiche restent séparés.')
                ->schema([
                    Forms\Components\TextInput::make('name')->label('Nom de cette fiche')->required()->maxLength(100),
                    Forms\Components\Select::make('event_id')->label('Mariage principal')
                        ->options(fn () => Event::query()->when(!auth('web')->check(), fn ($q) => $q->whereKey(auth('event_manager')->id()))
                            ->get()->mapWithKeys(fn ($e) => [$e->id => $e->groom_name . ' & ' . $e->bride_name . ' · ' . $e->reference]))
                        ->searchable()->required()->live()
                        ->afterStateUpdated(function ($state, Forms\Set $set) {
                            $event = Event::query()->when(!auth('web')->check(), fn ($q) => $q->whereKey(auth('event_manager')->id()))->find($state);
                            if ($event) {
                                $set('date', $event->civil_date);
                                $set('time', $event->civil_time);
                                $set('venue', $event->civil_commune);
                            }
                        })
                        ->rules([fn () => function ($attribute, $value, $fail) {
                            if (!auth('web')->check() && (int) $value !== (int) auth('event_manager')->id()) $fail('Ce mariage ne vous est pas accessible.');
                        }]),
                    Forms\Components\Select::make('civil_template_id')->label('Modèle d’invitation')->relationship('template', 'name')->required()->default(fn () => \App\Models\CivilTemplate::where('key', 'ambre')->value('id')),
                    Forms\Components\Placeholder::make('preview')->label('Découvrir le modèle')->content(new \Illuminate\Support\HtmlString('<a href="' . route('civil.preview') . '" target="_blank" rel="noopener">Voir Jardin d’ambre ↗</a>')),
                    Forms\Components\DatePicker::make('date')->label('Date du civil')->required(),
                    Forms\Components\TimePicker::make('time')->label('Heure')->seconds(false)->required(),
                    Forms\Components\TextInput::make('venue')->label('Commune / lieu')->maxLength(100)->required(),
                    Forms\Components\TextInput::make('address')->label('Adresse (facultatif)')->maxLength(160),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->label('Mariage civil')->searchable(),
            Tables\Columns\TextColumn::make('event.groom_name')->label('Marié')->placeholder('À relier'),
            Tables\Columns\TextColumn::make('event.bride_name')->label('Mariée'),
            Tables\Columns\TextColumn::make('date')->label('Date')->date('d/m/Y')->placeholder('À compléter'),
            Tables\Columns\TextColumn::make('guests_count')->label('Invitations')->counts('guests'),
            Tables\Columns\TextColumn::make('template.name')->label('Modèle'),
        ])->actions([Tables\Actions\EditAction::make()->label('Gérer / invités')]);
    }

    public static function getRelations(): array { return [GuestsRelationManager::class]; }
    public static function getPages(): array
    {
        return ['index' => Pages\ListCivilWeddings::route('/'), 'create' => Pages\CreateCivilWedding::route('/create'), 'edit' => Pages\EditCivilWedding::route('/{record}/edit')];
    }
}
