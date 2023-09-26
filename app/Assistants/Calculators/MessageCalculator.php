<?php


namespace App\Assistants\Calculators;

use App\Models\Tickets\Ticket;

class MessageCalculator
{
    public static function calculateTicketsMessages()
    {
        $newMessages = 0;
        $tickets = Ticket::all();

        foreach ($tickets as $ticket) {
            $newMessages += $ticket->user_new_messages;
        }

        return $newMessages;
    }
}
