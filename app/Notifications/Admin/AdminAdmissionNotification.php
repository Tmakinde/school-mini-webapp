<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdmissionNotification extends Notification
{
    use Queueable;
    public $parents;
    public $studentDetails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($parent, $studentDetails)
    {
        $this->parents = $parent;
        $this->studentDetails = $studentDetails;
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
                    ->line('<b>Parent Details</b>')
                    ->line($this->parents->father_name)
                    ->line($this->parents->mother_name)
                    ->line($this->parents->phone_number)
                    ->line()
                    ->line('<b>Student Details</b>')
                    ->line($this->studentDetails->full_name)
                    ->line($this->parents->mother_name)
                    ->line($this->parents->phone_number)
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
