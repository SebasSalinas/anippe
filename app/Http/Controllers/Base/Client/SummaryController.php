<?php

namespace App\Http\Controllers\Base\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(Client $client)
    {
        return view('base.client.summary', compact('client'));
    }
}
