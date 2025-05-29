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
                        Forms\Components\TextInput::make('bride_name')->label("Nom de la mariée (femme)")->required(),
                        Forms\Components\TextInput::make('groom_name')->label("Nom du marié (homme)")->required(),
                        Forms\Components\DatePicker::make('wedding_date')->label("Date du mariage")->required(),
                        Forms\Components\FileUpload::make('couple_photo')
                            ->label('Photo du couple')
                            ->image()
                            ->directory('couples') // le dossier dans storage/app/public/couples
                            ->visibility('public') // pour affichage sans auth spéciale
                            ->imagePreviewHeight('150')
                            ->maxSize(2048), // taille en Ko

                ])->columns(3),

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
                        Forms\Components\TextInput::make('manager_name')->label("Nom du gérant")->required(),
                        Forms\Components\TextInput::make('manager_contact')->label("Contact du gérant")->required(),
                        Forms\Components\TextInput::make('password')
                            ->label('Mot de passe de gestion')
                            ->password()
                            ->required(fn(string $context) => $context === 'create')
                            ->dehydrateStateUsing(fn($state) => !empty($state) ? bcrypt($state) : null)
                            ->dehydrated(fn($state) => filled($state)),
                    ])->columns(2),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
            'manage-tables' => ManageTables::route('/{record}/tables'),
        ];
    }
}
