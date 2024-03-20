<?php

namespace App\Filament\Auth;

use Filament\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Illuminate\Support\Js;

class EditProfile extends BaseEditProfile
{
    // public function backAction(): Action
    // {
    //     return Action::make('back')
    //         // ->label(__('filament-panels::pages/auth/edit-profile.actions.cancel.label'))
    //         ->label('Back')
    //         ->alpineClickHandler('document.referrer ? window.history.back() : (window.location.href = ' . Js::from(filament()->getUrl()) . ')')
    //         ->color('gray');
    // }
}