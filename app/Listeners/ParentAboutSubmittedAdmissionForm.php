<?php

namespace App\Listeners;

use App\Events\ParentAdmissionProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\Parent\AdmissionNotification;

class ParentAboutSubmittedAdmissionForm
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ParentAdmissionProcessed  $event
     * @return void
     */
    public function handle(ParentAdmissionProcessed $event)
    {
        $delayUntil = Carbon::now()->addMinutes(5);
        $event->parent->notify(new AdmissionNotification($event->parent))->delay($delayUntil);
    }
    
}
