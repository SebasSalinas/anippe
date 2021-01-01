<?php
/**
 * Project: anippe
 * File: TicketsController.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 20:56
 */

namespace App\Http\Controllers\Base\Project;


use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Project;
use App\Models\Ticket;
use Yajra\DataTables\Facades\DataTables;

class TicketsController extends Controller
{
    public function index(Project $project)
    {
        return view('base.project.tickets', compact('project'));
    }

    public function datatable(Project $project)
    {
        $tickets = $project->tickets();

        return Datatables::of($tickets)
            ->addColumn('action', function (Ticket $ticket) {
                return view('base.contacts.actions', $ticket);
            })
            ->editColumn('created', function (Ticket $ticket) {
                return $ticket->created_at;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
