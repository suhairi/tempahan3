<?php

namespace App\Filament\Resources\CarmodelResource\Pages;

use App\Filament\Resources\CarmodelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarmodel extends EditRecord
{
    protected static string $resource = CarmodelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
