<?php

namespace App\Http\Livewire\Base\Contact;

use Livewire\Component;

class Edit extends Component
{
    public $contact;

    public function mount($contact)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('livewire.base.contact.edit');
    }
}
