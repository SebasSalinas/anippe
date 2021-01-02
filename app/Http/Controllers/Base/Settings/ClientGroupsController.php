<?php

namespace App\Http\Controllers\Base\Settings;

use App\Http\Controllers\Controller;
use App\Models\ClientGroup;
use Yajra\DataTables\Facades\DataTables;

class ClientGroupsController extends Controller
{
    public function index()
    {
        return view('base.settings.client-groups.index');
    }

    public function datatable()
    {
        $clientGroups = ClientGroup::all();

        return Datatables::of($clientGroups)
            ->editColumn('name', function (ClientGroup $clientGroup) {
                return $clientGroup->name;
            })
            ->addColumn('action', function (ClientGroup $clientGroup) {
                return view('base.settings.roles.actions', ['role' => $clientGroup]);
            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }
}
