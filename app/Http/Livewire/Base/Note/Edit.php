<?php

namespace App\Http\Livewire\Base\Note;

use App\Http\Livewire\WithDispatchBrowserEvents;
use App\Models\Note;
use Livewire\Component;

class Edit extends Component
{
    use WithDispatchBrowserEvents;

    public $title;

    public $content;

    public $noteId;

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:3'
    ];

    protected $listeners = ['editNote'];

    public function editNote($note)
    {
        $this->title = $note['title'];
        $this->content = $note['content'];
        $this->noteId = $note['id'];
    }

    public function update()
    {
        $this->validate();

        Note::find($this->noteId)->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        flash()->success('Project has been deleted.');

        $this->dispatchSaved('editNoteModal');
    }

    public function render()
    {
        return view('livewire.base.note.edit');
    }

    private function mapFields($note)
    {
        $this->title = $note->title;
        $this->content = $note->content;
    }
}
