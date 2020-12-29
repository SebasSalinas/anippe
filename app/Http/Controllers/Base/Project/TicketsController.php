<?php
/**
 * Project: anippe
 * File: TicketsController.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 20:56
 */

namespace App\Http\Controllers\Base\Project;


use App\Http\Controllers\Controller;
use App\Models\Project;

class TicketsController extends Controller
{
    public function index(Project $project)
    {
        return view('base.project.tickets', compact('project'));
    }
}
