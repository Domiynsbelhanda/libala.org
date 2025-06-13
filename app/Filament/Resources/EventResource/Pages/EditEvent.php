<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    public function getTitle(): string
    {
        return 'Gestion du mariage de ' . $this->record->groom_name . ' & ' . $this->record->bride_name;
    }


    protected function getHeaderActions(): array
    {
        return [
            Action::make('Tables')
                ->label('🪑 Tables')
                ->url(fn ($record) => static::getResource()::getUrl('manage-tables', ['record' => $record]))
                ->color('primary')
                ->tooltip('Voir les tables de l’événement'),

            Action::make('Invités')
                ->label('🧑🏽‍🤝‍🧑🏽 Invités')
                ->url(fn ($record) => static::getResource()::getUrl('manage-guests', ['record' => $record]))
                ->color('success')
                ->tooltip('Voir la liste des invités'),

            Action::make('Par Table')
                ->label('📋 Invitations')
                ->url(fn ($record) => static::getResource()::getUrl('guests-by-table', ['record' => $record]))
                ->color('warning')
                ->tooltip('Voir la répartition des invités par table'),

            Actions\Action::make('save')
                ->label('Enregistrer')
                ->color('primary')
                ->action('save')
                ->icon('heroicon-o-check')
                ->requiresConfirmation(false)
                ->visible(fn () => true),

            Actions\DeleteAction::make()
                ->visible(!auth()->guard('event_manager')->check()),
        ];
    }
}
