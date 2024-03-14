<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

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
            ->title('User registered : ' . $user->name)
            ->body('The user has been created successfully.')
            ->sendToDatabase(auth()->user());
               
    }
}
