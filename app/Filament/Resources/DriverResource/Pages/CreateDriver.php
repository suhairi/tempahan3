<?php

namespace App\Filament\Resources\DriverResource\Pages;

use App\Filament\Resources\DriverResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateDriver extends CreateRecord
{
    protected static string $resource = DriverResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        // dd($this->user()->role()->name);

        $user = $this->record;

        // Mail::to($user)
        //     // ->send(new UserCreated($user))
        //     ->queue(new UserCreated($user))
        //     ;

        return Notification::make()
            ->success()
            ->title('Create Driver')
            ->body('You have created a driver successfully.')
            ->sendToDatabase($user);
    }
}
