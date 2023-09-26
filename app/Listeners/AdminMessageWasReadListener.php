<?php

namespace App\Listeners;

use App\Events\AdminMessageWasRead;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdminMessageWasReadListener
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
     * @param  AdminMessageWasRead  $event
     * @return void
     */
    public function handle(AdminMessageWasRead $event)
    {
        $event->ticket->resetAdminMessagesCount();
    }
}
