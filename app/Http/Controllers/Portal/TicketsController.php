<?php

namespace App\Http\Controllers\Portal;

use App\Enums\Priority;
use App\Enums\TicketStatus;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\TicketDepartment;
use App\Services\TicketService;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TicketsController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index()
    {
        return view('portal.tickets.index');
    }

    public function datatable()
    {
        //Ticket for logged contact
        $tickets = Ticket::whereHasMorph('creator', [Contact::class], function ($query) {
            $query->where('id', auth()->user()->id);
        })->with(['department', 'project']);

        return Datatables::of($tickets)
            ->editColumn('title', function (Ticket $ticket) {
                return '<a href="' . $ticket->portalLink() . '" class="text-bold text-info">' . $ticket->title . '</a>';
            })
            ->addColumn('department', function (Ticket $ticket) {
                return $ticket->department->name;
            })
            ->addColumn('project', function (Ticket $ticket) {
                return $ticket->project != null ? $ticket->project->name : '';
            })
            ->addColumn('status', function (Ticket $ticket) {
                return TicketStatus::getDescription($ticket->status_id);
            })
            ->addColumn('priority', function (Ticket $ticket) {
                return Priority::getDescription($ticket->priority_id);
            })
            ->addColumn('last_reply', function (Ticket $ticket) {
                return $ticket->last_reply_at;
            })
            ->rawColumns(['action', 'title'])
            ->make(true);
    }

    public function create()
    {
        $departments = TicketDepartment::get(['id', 'name']);

        $projects = Project::whereClientId(auth()->user()->client->id)->get(['id', 'name']);

        $priorities = Priority::asSelectArray();

        return view('portal.tickets.create', compact('departments', 'projects', 'priorities'));
    }


    public function store(Request $request)
    {
        $this->ticketService->createTicket($request);

        $this->flashSaveSuccess();

        return redirect()->route('portal.tickets.index');
    }


    public function show(Ticket $ticket)
    {
        $ticket->load(['replies.creator', 'media']);

        return view('portal.tickets.show', compact('ticket'));
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        $this->flashSaveSuccess();

        return redirect()->route('portal.tickets.index');
    }

    public function reply(Request $request, Ticket $ticket)
    {
        $this->validate($request, [
            'reply' => 'required',
            'attachment' => 'sometimes|max:2048'
        ]);

        $this->ticketService->addPortalReply($request, $ticket);

        $this->flashSaveSuccess();

        return redirect()->route('portal.tickets.show', $ticket);
    }
}
