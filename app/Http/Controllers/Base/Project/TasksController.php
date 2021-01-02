<?php
/**
 * Project: anippe
 * File: TasksController.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 21:08
 */

namespace App\Http\Controllers\Base\Project;


use App\Enums\Priority;
use App\Enums\TaskStatus;
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
        $tasks = $project->tasks()->with('users');

        return Datatables::of($tasks)
            ->addColumn('action', function (Task $task) {
                return view('livewire.base.task.actions', ['task' => $task]);
            })
            ->addColumn('has_attachment', function (Task $task) {
                $hasAttachment = $task->count_media;
                return $hasAttachment ? '<span><i class="fa fa-paperclip"> ' . $hasAttachment . '</i></span>' : '';
            })
            ->addColumn('start_date', function (Task $task) {
                return $task->start_at;
            })
            ->addColumn('due_date', function (Task $task) {
                return $task->deadline_at;
            })
            ->addColumn('status', function (Task $task) {
                return TaskStatus::getDescription($task->status_id);
            })
            ->addColumn('priority', function (Task $task) {
                return Priority::getDescription($task->priority_id);
            })
            ->addColumn('assigned_to', function (Task $task) {
                return $task->members;
            })
            ->editCOlumn('name', function (Task $task) {
                return '<a href="' . $task->link() . '" class="text-bold text-info">' . $task->name . '</a>';

            })
            ->editColumn('created_at', function (Task $task) {
                return $task->created_at;
            })
            ->rawColumns(['action', 'has_attachment', 'name'])
            ->make(true);
    }
}
