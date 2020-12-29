<?php
/**
 * Project: anippe
 * File: SummaryController.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 20:48
 */

namespace App\Http\Controllers\Base\Project;


use App\Http\Controllers\Controller;
use App\Models\Project;

class SummaryController extends Controller
{
    public function index(Project $project)
    {
        return view('base.project.summary', compact('project'));
    }
}
