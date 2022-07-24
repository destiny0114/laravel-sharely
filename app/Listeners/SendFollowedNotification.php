<?php

namespace App\Listeners;

use App\Events\Followed;
use App\Notifications\UserFollowed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendFollowedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Followed  $event
     * @return void
     */
    public function handle(Followed $event)
    {
        return auth()->user()->notify(new UserFollowed($event->followed_user));
    }
}
