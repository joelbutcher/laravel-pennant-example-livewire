<?php

namespace App\Features;

use App\Models\User;
use Illuminate\Support\Lottery;

class Teams
{
    /**
     * Resolve the feature's initial value.
     */
    public function resolve(User $user): mixed
    {
        return match (true) {
            $user->isAdmin() => true,
            default => false,
        };
    }
}
