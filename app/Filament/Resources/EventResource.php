<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\Pages\ManageTables;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Mariages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations des mariés')
                    ->schema([
                        Forms\Components\TextInput::make('groom_name')->label("Prénom du marié (homme)")->required(),
                        Forms\Components\TextInput::make('bride_name')->label("Prénom de la mariée (femme)")->required(),
                        Forms\Components\DatePicker::make('wedding_date')->label("Date du mariage")->required(),
                        Forms\Components\TextInput::make('max_guests')
                            ->label('Nombre maximal d’invités')
                            ->numeric()
                            ->minValue(1)
                            ->disabled(auth()->guard('event_manager')->check())
                            ->required(),
                        Forms\Components\FileUpload::make('couple_photo')
                            ->label('Photo du couple')
                            ->image()
                            ->directory('couples') // le dossier dans storage/app/public/couples
                            ->visibility('public') // pour affichage sans auth spéciale
                            ->imagePreviewHeight('150')
                            ->maxSize(2048), // taille en Ko

                        Forms\Components\Select::make('template_id')
                            ->label("Modèle de présentation")
                            ->relationship('template', 'name') // suppose que la colonne est 'name'
                            ->placeholder('Sélectionner un modèle')
                            ->required(false), // ou ->required() si obligatoire

                    ])->columns(3),


                Forms\Components\Section::make('Présentation du couple')
                    ->description("Informations détaillées sur le mari et la femme")
                    ->schema([
                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('husband_fullname')
                                ->label("Nom complet du mari"),
                            Forms\Components\Textarea::make('husband_description')
                                ->label("Description du mari")
                                ->rows(4),
                            Forms\Components\FileUpload::make('husband_image')
                                ->label("Image du mari")
                                ->image()
                                ->directory('couples/husband')
                                ->visibility('public')
                                ->imagePreviewHeight('150')
                                ->maxSize(2048),
                        ])->columnSpan(1),

                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('wife_fullname')
                                ->label("Nom complet de la femme"),
                            Forms\Components\Textarea::make('wife_description')
                                ->label("Description de la femme")
                                ->rows(4),
                            Forms\Components\FileUpload::make('wife_image')
                                ->label("Image de la femme")
                                ->image()
                                ->directory('couples/wife')
                                ->visibility('public')
                                ->imagePreviewHeight('150')
                                ->maxSize(2048),
                        ])->columnSpan(1),
                    ])->columns(2),

                Forms\Components\Section::make('Mariage civil')
                    ->schema([
                        Forms\Components\TextInput::make('civil_commune')->label("Commune"),
                        Forms\Components\DatePicker::make('civil_date')->label("Date"),
                        Forms\Components\TimePicker::make('civil_time')->label("Heure"),
                    ])->columns(2),

                Forms\Components\Section::make('Mariage religieux')
                    ->schema([
                        Forms\Components\TextInput::make('church_name')->label("Église/Paroisse"),
                        Forms\Components\TextInput::make('church_address')->label("Adresse"),
                        Forms\Components\DatePicker::make('church_date')->label("Date"),
                        Forms\Components\TimePicker::make('church_time')->label("Heure"),
                    ])->columns(2),

                Forms\Components\Section::make('Soirée')
                    ->schema([
                        Forms\Components\TextInput::make('reception_hall')->label("Nom de la salle"),
                        Forms\Components\TextInput::make('reception_address')->label("Adresse"),
                        Forms\Components\DatePicker::make('reception_date')->label("Date"),
                        Forms\Components\TimePicker::make('reception_time')->label("Heure"),
                    ])->columns(2),

                Forms\Components\Section::make('Organisation')
                    ->schema([
                        Forms\Components\TextInput::make('theme')->label("Thème / Dress Code"),
                        Forms\Components\TextInput::make('manager_name')->label("Nom du gérant")
                            ->disabled(auth()->guard('event_manager')->check())
                            ->required(),
                        Forms\Components\TextInput::make('manager_contact')->label("Contact du gérant")
                            ->disabled(auth()->guard('event_manager')->check())
                            ->required(),
                        Forms\Components\TextInput::make('password')
                            ->label('Mot de passe de gestion')
                            ->password()
                            ->required(fn(string $context) => $context === 'create')
                            ->dehydrateStateUsing(fn($state) => !empty($state) ? bcrypt($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->visible(!auth()->guard('event_manager')->check()),

                    ])->columns(2),

                Forms\Components\Section::make('Galerie du mariage')
                    ->description('Vous pouvez uploader jusqu\'à 8 images.')
                    ->schema([
                        Forms\Components\FileUpload::make('gallery')
                            ->label('Galerie (max 8 images)')
                            ->multiple()
                            ->reorderable()
                            ->directory('galleries')
                            ->image()
                            ->maxFiles(8)
                            ->imagePreviewHeight('150')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference')->label('ID')->searchable()->copyable(),
                Tables\Columns\TextColumn::make('bride_name')->label('Mariée'),
                Tables\Columns\TextColumn::make('groom_name')->label('Marié'),
                Tables\Columns\TextColumn::make('wedding_date')->label('Date du mariage')->date(),
                Tables\Columns\TextColumn::make('manager_name')->label('Gérant'),
                Tables\Columns\TextColumn::make('manager_contact')->label('Contact'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('Partager')
                    ->icon('heroicon-o-share')
                    ->url(fn($record) => route('event.detail', ['reference' => $record->reference]))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return !auth()->guard('event_manager')->check();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
            'manage-tables' => ManageTables::route('/{record}/tables'),
            'manage-guests' => Pages\ManageGuests::route('/{record}/guests'),
            'guests-by-table' => Pages\ManageGuestTables::route('/{record}/guests-by-table'),
        ];
    }
}
