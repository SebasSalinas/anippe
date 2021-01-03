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
        $roles = Role::query();

        return Datatables::of($roles)
            ->addColumn('action', function (Role $role) {
                return view('base.settings.roles.actions', ['role' => $role]);
            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }
}
