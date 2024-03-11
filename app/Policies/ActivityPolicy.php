<?php

namespace App\Policies;

use App\Models\User;

class ActivityPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public static function viewAny(User $user): bool 
    {
        return $user->hasRole('Super Admin');
    }
}
