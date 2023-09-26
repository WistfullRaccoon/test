<?php

namespace App\Listeners;

use App\Events\HasViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HasViewedListener
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
     * @param  HasViewed  $event
     * @return void
     */
    public function handle(HasViewed $event)
    {
        $event->entity->increment('views');
    }
}
