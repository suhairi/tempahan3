<?php

namespace App\Filament\Resources\CarmodelResource\Pages;

use App\Filament\Resources\CarmodelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarmodels extends ListRecords
{
    protected static string $resource = CarmodelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
