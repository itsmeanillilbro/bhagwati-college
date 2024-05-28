<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the given model.
     *
     * @param  \App\Models\User  $authenticatedUser
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function delete(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->hasRole('admin') && $authenticatedUser->id !== $user->id;
    }
}
