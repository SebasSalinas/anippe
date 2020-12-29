<?php

namespace App\Http\Livewire\Base\Contact;

use App\Models\Contact;
use Livewire\Component;

class Create extends Component
{
    public $firstName;

    public $lastName;

    public $email;

    public $phone;

    public $client;

    public $contact;

    protected $rules = [
        'firstName' => 'required|min:3',
        'lastName' => 'required|min:3',
        'email' => 'required|email|unique:contacts,email',
        'phone' => 'required'
    ];

    public function mount($client)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->client = $client;
    }

    public function store()
    {
        $this->validate();

        Contact::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'organisation_id' => 1,
            'client_id' => $this->client->id
        ]);

        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatchBrowserEvent('saved', ['modal', 'createContactModal']);
    }

    public function render()
    {
        return view('livewire.base.contact.create');
    }
}
