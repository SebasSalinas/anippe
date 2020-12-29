<?php
/**
 * Project: anippe
 * File: UsersController.php
 * Author: Luka
 * Date: 28.12.2020
 * Time: 16:17
 */

namespace App\Http\Controllers\Base\Settings;


class UsersController
{
    public function index()
    {
        return view('base.settings.users.index');
    }
}
