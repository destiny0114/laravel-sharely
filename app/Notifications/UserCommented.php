<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCommented extends Notification implements ShouldQueue
{
    use Queueable;

    protected User $commented_user;
    protected int|string $tweet_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $commented_user, int|string $tweet_id)
    {
        $this->commented_user = $commented_user;
        $this->tweet_id = $tweet_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'tweet_id' => $this->tweet_id,
            'username' => $this->commented_user->username,
            'name' => $this->commented_user->name,
            'avatar' => $this->commented_user->avatar,
            'body' => 'Commented your post.'
        ];
    }
}
