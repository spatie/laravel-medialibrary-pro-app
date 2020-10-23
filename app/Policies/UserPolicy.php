<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function uploadFiles(?User $user)
    {
        ld('in uploadFiles method of policy');
        return true;
    }
}
