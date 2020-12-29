<?php
/**
 * Project: anippe
 * File: TasksController.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 21:08
 */

namespace App\Http\Controllers\Base\Project;


use App\Http\Controllers\Controller;
use App\Models\Project;

class TasksController extends Controller
{
    public function index(Project $project)
    {
        return view('base.project.tasks', compact('project'));
    }
}
