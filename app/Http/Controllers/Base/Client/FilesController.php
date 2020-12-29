<?php
/**
 * Project: anippe
 * File: DocumentsController.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 21:45
 */

namespace App\Http\Controllers\Base\Client;


use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
use Yajra\DataTables\Facades\DataTables;

class FilesController extends Controller
{
    public function index(Client $client)
    {
        return view('base.client.files', compact('client'));
    }

    public function datatable(Client $client)
    {
        $client->load('media');

        $files = $client->media;

        return Datatables::of($files)
            ->addColumn('action', function (Contact $contact) {
                return view('base.contacts.actions', $contact);
            })
            ->editColumn('created', function (Contact $contact) {
                return $contact->created_at;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
