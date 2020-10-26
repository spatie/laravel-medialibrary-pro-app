<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function uploadFiles(?User $user)
    {
        ld('in uploadFiles method of policy');
        return true;
    }
}
