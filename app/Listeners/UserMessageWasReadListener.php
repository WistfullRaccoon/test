<?php

namespace App\Listeners;

use App\Events\UserMessageWasRead;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserMessageWasReadListener
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
     * @param  UserMessageWasRead  $event
     * @return void
     */
    public function handle(UserMessageWasRead $event)
    {
        $event->ticket->resetUserMessagesCount();
    }
}
