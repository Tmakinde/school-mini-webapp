<?php

namespace App\Listeners;

use App\Events\ParentAdmissionProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\Admin\AdminAdmissionNotification;

class SuperAdminAboutParentAdmission
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  ParentAdmissionProcessed  $event
     * @return void
     */
    public function handle(ParentAdmissionProcessed $event)
    {
        //$event->superAdmins->notify(new AdminAdmissionNotification($event->parent, $event->admission));
        $delayUntil = Carbon::now()->addMinutes(15);
        Notification::send($event->superAdmins, new AdminAdmissionNotification($event->parent, $event->admission))->delay($delayUntil);
    }
    
}
