<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Str;

trait Likeable
{
    public function likes_count()
    {
        return $this->likes->count();
    }

    public function likes_format(User $user)
    {
        if ($this->hasLikedBy($user)) {
            $exclude_user_like = empty($this->likes_count() - 1);

            return "You" . ($exclude_user_like ? '' : ' and ' . $this->likes_count() - 1 . Str::plural(' other', $this->likes_count() - 1));
        }
        return $this->likes_count() . Str::plural(' other', $this->likes_count());
    }

    public function hasLikedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
