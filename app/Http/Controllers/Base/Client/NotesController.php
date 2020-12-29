<?php
/**
 * Project: anippe
 * File: NotesController.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 21:57
 */

namespace App\Http\Controllers\Base\Client;


use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Note;
use Yajra\DataTables\Facades\DataTables;

class NotesController extends Controller
{
    public function index(Client $client)
    {
        return view('base.client.notes', compact('client'));
    }

    public function datatable(Client $client)
    {
        $client->load('notes');

        $notes = $client->notes;

        return Datatables::of($notes)
            ->addColumn('action', function (Note $note) {
                return view('base.contacts.actions', $note);
            })
            ->editColumn('created', function (Note $note) {
                return $note->created_at;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
