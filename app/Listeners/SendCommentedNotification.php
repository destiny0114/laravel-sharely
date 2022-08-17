<?php

namespace App\Listeners;

use App\Events\Commented;
use App\Notifications\UserCommented;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCommentedNotification
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
     * @param  \App\Events\Commented  $event
     * @return void
     */
    public function handle(Commented $event)
    {
        return $event->author->notify(new UserCommented(auth()->user(), $event->id));
    }
}
