<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConsultationNotification extends Notification
{
    use Queueable;
   protected $first_name;
   protected $last_name;
   protected $email;
   protected $phone;
   protected $consultation;
   protected $source;


    /**
     * Create a new notification instance.
     */
    public function __construct($first_name , $last_name,$email, $phone,$consultation ,$source = 'contact')
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email =$email;
        $this->phone =$phone;
        $this->$consultation = $consultation;
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'consultation' => $this->consultation,
            'source' => $this->source,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

}
