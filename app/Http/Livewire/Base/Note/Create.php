<?php

namespace App\Http\Livewire\Base\Note;

use App\Http\Livewire\WithDispatchBrowserEvents;
use Livewire\Component;

class Create extends Component
{
    use WithDispatchBrowserEvents;

    public $title;

    public $content;

    public $related;

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:3'
    ];

    public function mount($related = null)
    {
        $this->related = $related;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        $this->related->notes()->create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => auth()->user()->id,
            'organisation_id' => 1
        ]);


        $this->dispatchSaved('createNoteModal', 'Note created', 'success');
    }

    public function render()
    {
        return view('livewire.base.note.create');
    }
}
