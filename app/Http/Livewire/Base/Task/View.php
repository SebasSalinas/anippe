<?php

namespace App\Http\Livewire\Base\Task;

use App\Models\Task;
use Livewire\Component;

class View extends Component
{
    public $task;

    protected $listeners = ['viewTask'];

    public function mount()
    {
        $this->task = new Task();
    }

    public function viewTask($task)
    {
        $this->task = Task::find($task['id']);
    }

    public function render()
    {
        $task = $this->task;

        return view('livewire.base.task.view', compact('task'));
    }
}
