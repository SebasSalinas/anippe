<?php
/**
 * Project: anippe
 * File: DashboardController.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 9:12
 */

namespace App\Http\Controllers\Portal;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('portal.dashboard.index');
    }
}
