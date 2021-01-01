<?php

namespace App\Http\Livewire\Base\Client;

use App\Http\Livewire\WithDispatchBrowserEvents;
use App\Models\Client;
use App\Models\Country;
use Livewire\Component;

class Edit extends Component
{
    use WithDispatchBrowserEvents;

    public $clientId;

    public $name;

    public $street;

    public $place;

    public $postalCode;

    public $countryId;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'street' => 'required',
            'place' => 'required',
            'postalCode' => 'required',
            'countryId' => 'required'
        ];
    }

    protected $listeners = ['editClient'];

    public function editClient($client)
    {
        $this->clientId = $client['id'];
        $this->name = $client['name'];
        $this->street = $client['street'];
        $this->place = $client['place'];
        $this->postalCode = $client['postal_code'];
        $this->countryId = $client['country_id'];
    }

    public function update()
    {
        $this->validate();

        Client::find($this->clientId)->update([
            'name' => $this->name,
            'street' => $this->street,
            'place' => $this->place,
            'postal_code' => $this->postalCode,
            'country_id' => $this->countryId
        ]);

        $this->dispatchSaved('editClientModal');
    }

    public function render()
    {
        $countries = Country::get(['id', 'name']);

        return view('livewire.base.client.edit', compact('countries'));
    }

}

