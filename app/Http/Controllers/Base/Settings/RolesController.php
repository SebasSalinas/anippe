<?php

namespace App\Http\Controllers\Base\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return view('base.settings.roles.index');
    }
}
