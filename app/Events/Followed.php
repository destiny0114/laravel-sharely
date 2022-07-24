<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class Followed
{
    use SerializesModels;

    public User $followed_user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $followed_user)
    {
        $this->followed_user = $followed_user;
    }
}
