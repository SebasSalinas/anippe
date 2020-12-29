<?php
/**
 * Project: anippe
 * File: DashboardController.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 11:55
 */

namespace App\Http\Controllers\Base;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('base.dashboard.index');
    }
}
