<?php

namespace App\Http\Controllers\Client\Profile;

use App\Assistants\Tickets\TicketService;
use App\Events\AdminMessageWasRead;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\CreateRequest;
use App\Http\Requests\Tickets\MessageRequest;
use App\Models\Tickets\Ticket;
use Auth;
use Gate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
    public function create()
    {
        $user = Auth::user();
        return view('client.profile.tickets.create', compact('user'));
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        try {
            $ticket = $this->service->create(Auth::id(), $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('own.profile', $ticket);
    }

    /**
     * @param Ticket $ticket
     * @return Factory|View
     */
    public function show(Ticket $ticket)
    {
        $user = Auth::user();
        $statuses = $this->service->getStatuses($ticket);
        $messages = $this->service->getMessages($ticket);
        event(new AdminMessageWasRead($ticket));

        return view('client.profile.tickets.show', compact('ticket', 'user', 'statuses', 'messages'));
    }

    public function message(MessageRequest $request, Ticket $ticket)
    {
        try {
            $this->service->message(Auth::id(), $ticket->id, $request, 'applicant');
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('profile.tickets.show', $ticket);
    }

    /**
     * @param Ticket $ticket
     * @return RedirectResponse
     */
    public function destroy(Ticket $ticket)
    {
        $this->checkAccess($ticket);
        try {
            $this->service->removeByOwner($ticket->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.favorites.index');
    }

    private function checkAccess(Ticket $ticket): void
    {
        if (!Gate::allows('manage-own-ticket', $ticket)) {
            abort(403);
        }
    }
}
