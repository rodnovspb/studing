<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderReady extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail()
    {

        return (new MailMessage)
                    ->subject('Тема письма')
                    ->greeting('Привет!')
                    ->line("Уведомление для {$this->user->name}")
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!')
                    ->attach('storage/file1.jpg');
    }

    public function toArray()
    {
        return $this->user->toArray();
    }

}
