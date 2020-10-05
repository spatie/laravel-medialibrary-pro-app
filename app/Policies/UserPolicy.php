<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function uploadFiles(?User $user)
    {
        ld('in uploadFiles');
        return true;
    }
}
