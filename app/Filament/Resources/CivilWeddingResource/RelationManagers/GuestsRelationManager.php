<?php
namespace App\Filament\Resources\CivilWeddingResource\RelationManagers;

use App\Filament\Resources\CivilWeddingResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class GuestsRelationManager extends RelationManager
{
    protected static string $relationship = 'guests';
    protected static ?string $title = 'Invitations du mariage civil';
    protected static ?string $recordTitleAttribute = 'name';

    public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool { return CivilWeddingResource::canEdit($ownerRecord); }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Nom sur l’invitation')->required()->maxLength(100)
                ->unique(ignoreRecord: true, modifyRuleUsing: fn ($rule) => $rule->where('civil_wedding_id', $this->getOwnerRecord()->id)),
            Forms\Components\TextInput::make('phone')->label('WhatsApp (facultatif)')->helperText('Format international, par exemple +243…')->tel()->maxLength(30),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->description('Enregistrez d’abord le mariage principal, la date, l’heure et le lieu pour activer les invitations. « Image + texte » ouvre les options de partage du téléphone.')
            ->modifyQueryUsing(fn ($query) => $query->with('wedding.event'))
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Invité(s)')->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('WhatsApp')->placeholder('Non renseigné'),
            ])->headerActions([Tables\Actions\CreateAction::make()->label('Ajouter une invitation')])
            ->actions([
                Tables\Actions\Action::make('view')->label('Voir l’invitation')->icon('heroicon-o-eye')->openUrlInNewTab()
                    ->disabled(fn () => !$this->getOwnerRecord()->isReady())
                    ->url(fn ($record) => $this->getOwnerRecord()->isReady() ? $record->invitationUrl() : null),
                Tables\Actions\Action::make('whatsapp')->label('WhatsApp')->icon('heroicon-o-chat-bubble-left-ellipsis')->color('success')->openUrlInNewTab()
                    ->disabled(fn () => !$this->getOwnerRecord()->isReady())
                    ->url(fn ($record) => $this->getOwnerRecord()->isReady() ? $record->whatsappUrl() : null),
                Tables\Actions\Action::make('image_share')->label('Image + texte')->icon('heroicon-o-photo')->openUrlInNewTab()
                    ->disabled(fn () => !$this->getOwnerRecord()->isReady())
                    ->url(fn ($record) => $this->getOwnerRecord()->isReady() ? route('civil.share', ['reference' => $record->wedding->reference, 'code' => $record->code]) : null),
                Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make(),
            ]);
    }
}
