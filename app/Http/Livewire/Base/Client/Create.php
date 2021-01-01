<?php

namespace App\Http\Livewire\Base\Client;

use App\Http\Livewire\WithDispatchBrowserEvents;
use App\Models\Client;
use App\Models\Country;
use Livewire\Component;

class Create extends Component
{
    use WithDispatchBrowserEvents;

    public $name;

    public $street;

    public $place;

    public $postalCode;

    public $countryId;

    protected $rules = [
        'name' => 'required|min:3',
        'street' => 'required',
        'place' => 'required',
        'postalCode' => 'required',
        'countryId' => 'required'
    ];

    public function store()
    {
        $this->validate();

        Client::create([
            'name' => $this->name,
            'street' => $this->street,
            'place' => $this->place,
            'postal_code' => $this->postalCode,
            'country_id' => $this->countryId
        ]);

        $this->dispatchSaved('createClientModal', 'Client created', 'success');
    }

    public function render()
    {
        $countries = Country::get(['id', 'name']);

        return view('livewire.base.client.create', compact('countries'));
    }
}
