<?php
/**
 * Project: anippe
 * File: TasksController.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 22:01
 */

namespace App\Http\Controllers\Base\Client;


use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Note;
use App\Models\Task;

class TasksController extends Controller
{
    public function index(Client $client)
    {
        return view('base.client.tasks', compact('client'));
    }

    public function datatable(Client $client)
    {
        $client->load('tasks');

        $tasks = $client->tasks;

        return Datatables::of($tasks)
            ->addColumn('action', function (Task $task) {
                return view('base.contacts.actions', $task);
            })
            ->editColumn('created', function (Task $task) {
                return $task->created_at;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
