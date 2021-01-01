<?php

namespace App\Http\Livewire\Base\Contact;

use App\Models\Contact;
use Livewire\Component;

class Edit extends Component
{
    public $contactId;

    public $firstName;

    public $lastName;

    public $email;

    public $phone;

    protected $listeners = ['editContact'];

    protected $rules = [
        'firstName' => 'required|min:3',
        'lastName' => 'required|min:3',
        'email' => 'required|email|unique:contacts,email',
        'phone' => 'required'
    ];

    public function editContact($contact)
    {
        $this->contactId = $contact['id'];
        $this->firstName = $contact['first_name'];
        $this->lastName = $contact['last_name'];
        $this->email = $contact['email'];
        $this->phone = $contact['phone'];
    }

    public function updateContact()
    {
        $this->validate();

        Contact::find($this->contactId)->update([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone
        ]);

        flash()->success('Contact saved');

        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatchBrowserEvent('formSaved', [
            'modal', 'editContactModal',
            'datatable', 'base.contacts.table'
        ]);
    }

    public function render()
    {
        return view('livewire.base.contact.edit');
    }

}
