<?php

namespace App\Notifications\Parent;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Parents;
class AdmissionNotification extends Notification
{
    use Queueable;
    public $parents;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($parent)
    {
        $this->parents = $parent;
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
                    ->line('<p>Hello Mr <b>'.$this->parents->name.'</b></p>')
                    ->line('Your Admission is being processed, you will be notify after it has been approved by the admin.')
                    ->line('<b>Thank you for your registration!</b>');
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
            //
        ];
    }
}
