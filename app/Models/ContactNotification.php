<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;
   protected $name;
   protected $email;
   protected $phone;
   protected $message;
   protected $source;


    /**
     * Create a new notification instance.
     */
    public function __construct($name ,$email, $phone, $message,$source = 'contact')
    {
        $this->name =$name;
        $this->email =$email;
        $this->phone =$phone;
        $this->message =$message;
        $this->source = $source;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return [
           'email' => $this->email,
            'name' => $this->name,
            'phone' => $this->phone,
            'message' => $this->message,
            'source' => $this->source,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

}
