<?php

namespace App\Filament\Resources\CartypeResource\Pages;

use App\Filament\Resources\CartypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCartype extends EditRecord
{
    protected static string $resource = CartypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
