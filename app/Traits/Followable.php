<?php

namespace App\Traits;

use App\Events\Followed;
use App\Models\User;

trait Followable
{
    public function follow(User $user)
    {
        return $this->followings()->attach($user);
    }

    public function unfollow(User $user)
    {
        return $this->followings()->updateExistingPivot($user->id, [
            'deleted_at' => now(),
        ]);;
    }

    public function toggleFollow(User $user)
    {
        $existing_follow = $this->follows()->withTrashed()->where('following_user_id', $user->id)->first();

        if (is_null($existing_follow)) {
            $this->follow($user);
            event(new Followed($user));
            return false;
        }

        if (is_null($existing_follow->deleted_at)) {
            return $this->unfollow($user);
        }

        return $existing_follow->restore();
    }

    public function isFollowing(User $user)
    {
        return $this->followings()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->whereNull('deleted_at');
    }
}
