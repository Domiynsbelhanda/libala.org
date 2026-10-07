<?php
namespace App\Filament\Resources\CivilWeddingResource\Pages;
use App\Filament\Resources\CivilWeddingResource;
use Filament\Resources\Pages\CreateRecord;
class CreateCivilWedding extends CreateRecord
{
    protected static string $resource = CivilWeddingResource::class;
    protected function getRedirectUrl(): string { return static::getResource()::getUrl('edit', ['record' => $this->record]); }
}
