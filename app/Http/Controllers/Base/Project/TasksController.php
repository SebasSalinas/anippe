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
use App\Models\Task;
use Yajra\DataTables\Facades\DataTables;

class TasksController extends Controller
{
    public function index(Project $project)
    {
        return view('base.project.tasks', compact('project'));
    }

    public function datatable(Project $project)
    {
        $tasks = $project->tasks();

        return Datatables::of($tasks)
            ->addColumn('action', function (Task $task) {

            })
            ->addColumn('has_attachment', function (Task $task) {

            })
            ->addColumn('start_date', function (Task $task) {

            })
            ->addColumn('due_date', function (Task $task) {

            })
            ->addColumn('status', function (Task $task) {

            })
            ->addColumn('priority', function (Task $task) {

            })
            ->addColumn('assigned_to', function (Task $task) {

            })
            ->editColumn('created', function (Task $task) {
                return $task->created_at;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
