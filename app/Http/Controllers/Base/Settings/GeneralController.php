<?php
/**
 * Project: anippe
 * File: GeneralController.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 8:49
 */

namespace App\Http\Controllers\Base\Settings;


use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function edit()
    {
        return view('base.settings.general');
    }

    public function update()
    {

    }
}
