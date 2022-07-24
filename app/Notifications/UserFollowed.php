<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserFollowed extends Notification implements ShouldQueue
{
    use Queueable;

    protected User $followed_user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $followed_user)
    {
        $this->followed_user = $followed_user;
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
            'username' => $this->followed_user->username,
            'name' => $this->followed_user->name,
            'avatar' => $this->followed_user->avatar,
            'body' => 'Followed You. Check it out.'
        ];
    }
}
