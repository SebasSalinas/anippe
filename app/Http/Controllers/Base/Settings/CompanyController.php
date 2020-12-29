<?php
/**
 * Project: anippe
 * File: CompanyController.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 8:57
 */

namespace App\Http\Controllers\Base\Settings;


use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function edit()
    {
        return view('base.settings.company');
    }

    public function update()
    {

    }
}
