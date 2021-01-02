<?php
/**
 * Project: anippe
 * File: UsersController.php
 * Author: Luka
 * Date: 28.12.2020
 * Time: 16:17
 */

namespace App\Http\Controllers\Base\Settings;


use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UsersController
{
    public function index()
    {
        return view('base.settings.users.index');
    }

    public function datatable()
    {
        $users = User::all();

        return Datatables::of($users)
            ->editColumn('name', function (User $user) {
                return $user->fullName;
            })
            ->addColumn('action', function (User $user) {
                return view('base.settings.roles.actions', ['role' => $user]);
            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }
}
