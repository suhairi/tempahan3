<?php

namespace App\Filament\Resources\VehiclebookingResource\Pages;

use App\Filament\Resources\VehiclebookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVehiclebookings extends ListRecords
{
    protected static string $resource = VehiclebookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('pdf')
                ->label('*Download The List*')
                ->color('info')
                ->icon('heroicon-o-document-arrow-down')
                
                ->openUrlInNewTab(),
        ];
    }
}
