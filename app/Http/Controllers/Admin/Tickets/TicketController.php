<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Assistants\Tickets\TicketService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\EditRequest;
use App\Http\Requests\Tickets\MessageRequest;
use App\Models\Tickets\Status;
use App\Models\Tickets\Ticket;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Events\UserMessageWasRead;

class TicketController extends Controller
{

    private $service;

    public function __construct(TicketService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $tickets = Ticket::orderByDesc('updated_at')->paginate(20);

        $statuses = Status::statusesList();

        return view('admin.tickets.index', compact('tickets', 'statuses'));
    }

    /**
     * @param Ticket $ticket
     * @return Factory|View
     */

    public function show(Ticket $ticket)
    {
        $statuses = $this->service->getStatuses($ticket);
        $messages = $this->service->getMessages($ticket);
        event(new UserMessageWasRead($ticket));

        return view('admin.tickets.show', compact('ticket','statuses', 'messages'));
    }

    /**
     * @param Ticket $ticket
     * @return Factory|View
     */
    public function edit(Ticket $ticket)
    {
        $statuses = Status::statusesList();
        $messages = $this->service->getMessages($ticket);

        return view('admin.tickets.edit', compact('ticket', 'statuses', 'messages'));
    }

    /**
     * @param EditRequest $request
     * @param Ticket $ticket
     * @return RedirectResponse
     */

    public function update(EditRequest $request, Ticket $ticket)
    {
        try {
            $this->service->edit($request, $ticket->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tickets.index');
    }

    public function message(MessageRequest $request, Ticket $ticket)
    {
        try {
            $this->service->message(Auth::id(), $ticket->id, $request, 'respondent');
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tickets.show', $ticket);
    }


    public function approve(Ticket $ticket)
    {
        try {
            $this->service->approve(Auth::id(), $ticket->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tickets.show', $ticket);
    }

    public function close(Ticket $ticket)
    {
        try {
            $this->service->close(Auth::id(), $ticket->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tickets.show', $ticket);
    }

    public function reopen(Ticket $ticket)
    {
        try {
            $this->service->reopen(Auth::id(), $ticket->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tickets.show', $ticket);
    }

    /**
     * @param Ticket $ticket
     * @return RedirectResponse
     */

    public function destroy(Ticket $ticket)
    {
        try {
            $this->service->removeByAdmin($ticket->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.tickets.index');
    }

}
