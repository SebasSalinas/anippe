<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Yajra\DataTables\Facades\DataTables;

class ClientsController extends Controller
{
    public function index()
    {
        return view('base.clients.index');
    }

    public function datatable()
    {
        $clients = Client::with(['groups','country']);

        return Datatables::of($clients)
            ->editColumn('name', function (Client $client) {
                return '<a href="' . $client->link() . '" class="text-bold text-info">' . $client->name . '</a>';
            })
            ->addColumn('address', function (Client $client) {
                return $client->fullAddress;
            })
            ->addColumn('groups', function (Client $client) {
                return $client->linkedGroups;
            })
            ->addColumn('action', function (Client $client) {
                return view('base.clients.actions', ['client'=>$client]);
            })
            ->editColumn('created', function (Client $client) {
                return $client->created_at;
            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }

    public function destroy(Client $client) {
        $client->delete();

        flash()->success('Client has been deleted');

        return redirect()->back();
    }
}
