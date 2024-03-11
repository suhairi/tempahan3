<?php

namespace App\Filament\Resources\DriverResource\Pages;

use App\Filament\Resources\DriverResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditDriver extends EditRecord
{
    protected static string $resource = DriverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        $superAdmin = User::find(1)->first();
        $user = auth()->user(); //$this->record;

        return Notification::make()
            ->success()
            ->title('Driver updated')
            ->body('You have updated driver - ' . $this->data['name'] . ' successfully.')
            ->sendToDatabase([$user, $superAdmin]);
    }
}
