<?php

namespace App\Http\Controllers\Base\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientGroupsController extends Controller
{
    public function index()
    {
        return view('base.settings.client-groups.index');
    }
}
