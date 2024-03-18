<?php

namespace App\Filament\Resources\VehiclebookingResource\Pages;

use App\Filament\Resources\VehiclebookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVehiclebooking extends EditRecord
{
    protected static string $resource = VehiclebookingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
