<?php
namespace App\Filament\Resources\CivilWeddingResource\Pages;
use App\Filament\Resources\CivilWeddingResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
class ListCivilWeddings extends ListRecords
{
    protected static string $resource = CivilWeddingResource::class;
    protected function getHeaderActions(): array { return [Actions\CreateAction::make()]; }
}
