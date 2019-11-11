<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewResponseAdded extends Notification
{
    use Queueable;

    public $conversation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($c)
    {
        $this->conversation = $c;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->greeting('Holla from PoleStar')
                    ->line('New Response left On a Conversation You are Watching')
                    ->action('View Conversation', route('conversation', ['slug' => $this->conversation->slug]))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification. used for broadcasting or saving into our databse
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }
}
