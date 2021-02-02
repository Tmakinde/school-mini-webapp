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
                    ->line('Hello Mr '.$this->parents->father_name.' and Mrs '.$this->parents->mother_name)
                    ->line('Your Admission is being processed, you will be notify after it has been approved by the admin.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for your registration!');
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
