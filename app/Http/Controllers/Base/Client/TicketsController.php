<?php
/**
 * Project: anippe
 * File: TicketsController.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 18:48
 */

namespace App\Http\Controllers\Base\Client;


use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Ticket;
use Yajra\DataTables\Facades\DataTables;

class TicketsController extends Controller
{
    public function index(Client $client)
    {
        return view('base.client.tickets', compact('client'));
    }

    public function datatable(Client $client)
    {
        $client->load('tickets');

        $tickets = $client->tickets;

        return Datatables::of($tickets)
            ->editColumn('title', function (Ticket $ticket) {
                return '<a href="#" class="text-bold text-info">' . $ticket->title . '</a>';
            })
            ->addColumn('action', function (Ticket $ticket) {
                return view('base.contacts.actions', $ticket);
            })
            ->editColumn('created', function (Ticket $ticket) {
                return $ticket->created_at;
            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }
}
