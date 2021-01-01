<?php
/**
 * Project: anippe
 * File: TasksController.php
 * Author: Luka
 * Date: 01.01.2021
 * Time: 23:59
 */

namespace App\Http\Controllers\Base;


use App\Http\Controllers\Controller;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        $task->delete();

        flash()->success('Task deleted');

        return redirect()->back();
    }
}
