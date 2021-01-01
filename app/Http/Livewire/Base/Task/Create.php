<?php

namespace App\Http\Livewire\Base\Task;

use App\Http\Livewire\WithDispatchBrowserEvents;
use App\Models\Client;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    use WithDispatchBrowserEvents;

    public $name;

    public $description;

    public $related;

    public $startDate;

    public $deadlineDate;

    public $users = [];

    public $priorityId;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:3',
    ];

    public function mount($related)
    {
        $this->related = $related;
    }

    public function store()
    {
        $this->validate();

        //Create task
        $task = $this->related->tasks()->create([
            'name' => $this->name,
            'creator_id' => auth()->user()->id,
            'creator_type' => 'user',
            'description' => $this->description,
            'start_at' => $this->startDate,
            'deadline_at' => $this->deadlineDate
        ]);

        //Link task with users
        $task->users()->attach($this->users);

        $this->dispatchSaved('createTaskModal', 'Task created', 'success');
    }

    public function render()
    {
        $usersList = User::all();

        return view('livewire.base.task.create', compact('usersList'));
    }
}
