<?php

namespace App\Http\Livewire\Admin\Organisation;

use App\Http\Livewire\WithDispatchBrowserEvents;
use App\Models\Country;
use App\Models\Organisation;
use Livewire\Component;

class Create extends Component
{
    use WithDispatchBrowserEvents;

    public $name;

    public $subDomain;

    public $street;

    public $place;

    public $postalCode;

    public $countryId;

    protected $rules = [
        'name' => 'required|min:3',
        'subDomain' => 'required|min:3|unique:organisations,subdomain',
        'street' => 'required',
        'place' => 'required',
        'postalCode' => 'required',
        'countryId' => 'required'
    ];

    public function store()
    {
        $this->validate();

        $organisation = Organisation::create([
            'name' => $this->name,
            'subdomain' => $this->subDomain,
            'street' => $this->street,
            'place' => $this->place,
            'postal_code' => $this->postalCode,
            'country_id' => $this->countryId
        ]);

        $organisation->users()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'password' => bcrypt('password'),
            'username' => 'admin',
            'email' => 'admin@' . $this->subDomain . '.com',
        ]);

        $this->dispatchSaved('createOrganisationModal', 'Organisation created', 'success');
    }

    public function render()
    {
        $countries = Country::get(['id', 'name']);

        return view('livewire.admin.organisation.create', compact('countries'));
    }
}
