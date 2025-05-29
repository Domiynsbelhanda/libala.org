<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

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
                ->label('📋 Invités par table')
                ->url(fn ($record) => static::getResource()::getUrl('guests-by-table', ['record' => $record]))
                ->color('warning')
                ->tooltip('Voir la répartition des invités par table'),

            Actions\DeleteAction::make(),
        ];
    }
}
