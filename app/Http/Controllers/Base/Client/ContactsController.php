<?php

namespace App\Http\Controllers\Base\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
use Yajra\DataTables\Facades\DataTables;

class ContactsController extends Controller
{
    public function index(Client $client)
    {
        return view('base.client.contacts', compact('client'));
    }

    public function datatable(Client $client)
    {
        $client->load('contacts');

        $contacts = $client->contacts;

        return Datatables::of($contacts)
            ->editColumn('fullName', function (Contact $contact) {
                return '<a href="#" class="text-bold text-info">' . $contact->fullName . '</a>';
            })
            ->addColumn('action', function (Contact $contact) {
                return view('base.contacts.actions', ['contact' => $contact]);
            })
            ->editColumn('created', function (Contact $contact) {
                return $contact->created_at;
            })
            ->rawColumns(['action', 'fullName'])
            ->make(true);
    }
}
