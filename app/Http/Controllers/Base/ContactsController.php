<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Yajra\DataTables\Facades\DataTables;

class ContactsController extends Controller
{
    public function index()
    {
        return view('base.contacts.index');
    }

    public function datatable()
    {
        $contacts = Contact::with('client');

        return Datatables::of($contacts)
            ->editColumn('fullName', function (Contact $contact) {
                return '<a href="#" class="text-bold text-info">' . $contact->fullName . '</a>';
            })
            ->addColumn('client', function (Contact $contact) {
                return '<a href="' . $contact->client->link() . '" class="text-bold text-info">' . $contact->client->name . '</a>';
            })
            ->addColumn('action', function (Contact $contact) {
                return view('base.contacts.actions', $contact);
            })
            ->editColumn('created', function (Contact $contact) {
                return $contact->created_at;
            })
            ->rawColumns(['action', 'fullName','client'])
            ->make(true);
    }
}
