<?php

namespace App\Http\Controllers\Base\Settings;

use App\Http\Controllers\Controller;
use App\Models\ClientGroup;
use App\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ClientGroupsController extends Controller
{
    public function index()
    {
        return view('base.settings.client-groups.index');
    }

    public function datatable()
    {
        $clientGroups = ClientGroup::query();

        return Datatables::of($clientGroups)
            ->editColumn('color', function (ClientGroup $clientGroup) {
                return '
                    <span><i style="color:'.$clientGroup->color. ';" class="fa fa-circle"></i></span>';
            })
            ->addColumn('action', function (ClientGroup $clientGroup) {
                return view('base.settings.roles.actions', ['role' => $clientGroup]);
            })
            ->rawColumns(['action', 'name','color'])
            ->make(true);
    }
}
