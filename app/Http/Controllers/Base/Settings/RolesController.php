<?php

namespace App\Http\Controllers\Base\Settings;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
    public function index()
    {
        return view('base.settings.roles.index');
    }

    public function datatable()
    {
        $roles = Role::all();

        return Datatables::of($roles)
            ->editColumn('name', function (Role $role) {
                return $role->name;
            })
            ->addColumn('action', function (Role $role) {
                return view('base.settings.roles.actions', ['role' => $role]);
            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }
}
