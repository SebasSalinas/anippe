<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TicketsController extends Controller
{
    public function index()
    {
        return view('base.tickets.index');
    }

    public function datatable()
    {
        $tickets = Ticket::query()
            ->with(['contact', 'creator', 'department', 'project'])
            ->latest()
            ->get();

        return Datatables::of($tickets)
            ->editColumn('title', function (Ticket $ticket) {
                return '<a href="'.$ticket->link().'" class="text-bold text-info">' . $ticket->title . '</a>';
            })
            ->editColumn('creator', function (Ticket $ticket) {
                return $ticket->creator->fullName;
            })
            ->addColumn('action', function (Ticket $ticket) {
                return view('base.contacts.actions', $ticket);
            })
            ->addColumn('status', function (Ticket $ticket) {
                return "Assigned";
            })
            ->addColumn('priority', function (Ticket $ticket) {
                return "Urgent";
            })
            ->addColumn('last_reply', function (Ticket $ticket) {
                return now()->subDay(1)->diffForHumans();
            })
            ->editColumn('created', function (Ticket $ticket) {
                return $ticket->created_at;
            })
            ->rawColumns(['action', 'title'])
            ->make(true);
    }

    public function show(Ticket $ticket)
    {
        return view('base.tickets.show', compact('ticket'));
    }
}
