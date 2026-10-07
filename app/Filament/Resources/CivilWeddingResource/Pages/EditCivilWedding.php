<?php
namespace App\Filament\Resources\CivilWeddingResource\Pages;
use App\Filament\Resources\CivilWeddingResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;
class EditCivilWedding extends EditRecord
{
    protected static string $resource = CivilWeddingResource::class;
    protected function getHeaderActions(): array { return [Actions\DeleteAction::make()]; }
}
