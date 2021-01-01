<?php
/**
 * Project: anippe
 * File: DashboardController.php
 * Author: Luka
 * Date: 01.01.2021
 * Time: 18:46
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
