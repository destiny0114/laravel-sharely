<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function edit_profile(User $current_user, User $user)
    {
        return $current_user->is($user);
    }

    public function follow(User $currentUser, User $user)
    {
        return $currentUser->isNot($user);
    }
}