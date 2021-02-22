<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminAdmissionNotification extends Notification
{
    use Queueable;
    public $parents;
    public $otherAdmissionDetails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($parent, $otherAdmissionDetails)
    {
        $this->parents = $parent;
        $this->otherAdmissionDetails = $otherAdmissionDetails;
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
                    ->line('<b>Hello Admin</b>')
                    ->line('New parent just register')
                    ->line('<b>Parent Name</b>')
                    ->line(Ucwords($this->parents->parent_name))
                    ->line('<br/>')
                    ->line('<b>Name of Child</b>')
                    ->line(Ucwords($this->otherAdmissionDetails->full_name))
                    ->action('Login to view message', url('/admin'));
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
