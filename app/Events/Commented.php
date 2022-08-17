<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Commented
{
    use SerializesModels;

    public User $author;
    public int|string $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $author, int|string $id)
    {
        $this->author = $author;
        $this->id = $id;
    }
}
