<?php

namespace App\Assistants\Tickets;

use App\Http\Requests\Tickets\CreateRequest;
use App\Http\Requests\Tickets\EditRequest;
use App\Http\Requests\Tickets\MessageRequest;
use App\Models\Tickets\Ticket;

class TicketService
{
    public function create(int $userId, CreateRequest $request): Ticket
    {
        return Ticket::add($userId, $request['subject'], $request['content']);
    }

    public function edit(EditRequest $request, int $id)
    {
        $ticket = $this->getTicket($id);
        $ticket->edit($request->only('subject', 'content'));
    }

    public function message(int $userId, int $id, MessageRequest $request, string $role): void
    {
        $ticket = $this->getTicket($id);
        $ticket->addMessage($userId, $request['message']);
        $role === 'respondent' ? $ticket->incrementAdminMessages() : $ticket->incrementUserMessages();
    }

    public function approve(int $userId, int $id): void
    {
        $ticket = $this->getTicket($id);
        $ticket->approve($userId);
    }

    public function close(int $userId, int $id): void
    {
        $ticket = $this->getTicket($id);
        $ticket->close($userId);
    }

    public function reopen(int $userId, int $id): void
    {
        $ticket = $this->getTicket($id);
        $ticket->reopen($userId);
    }

    public function removeByOwner(int $id): void
    {
        $ticket = $this->getTicket($id);
        if (!$ticket->canBeRemoved()) {
            throw new \DomainException('Невозможно удалить активный запрос');
        }
        try {
            $ticket->delete();
        } catch (\Exception $e) {
        }
    }

    public function removeByAdmin(int $id): void
    {
        $ticket = $this->getTicket($id);
        try {
            $ticket->delete();
        } catch (\Exception $e) {
        }
    }

    private function getTicket($id): Ticket
    {
        return Ticket::findOrFail($id);
    }

    public function getMessages(Ticket $ticket)
    {
        return $ticket->messages()->orderBy('id')->with('user')->get();
    }

    public function getStatuses(Ticket $ticket)
    {
        return $ticket->statuses()->orderBy('id')->with('user')->get();
    }

}
