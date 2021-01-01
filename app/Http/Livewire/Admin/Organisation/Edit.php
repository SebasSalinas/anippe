<?php

namespace App\Http\Livewire\Admin\Organisation;

use App\Http\Livewire\WithDispatchBrowserEvents;
use App\Models\Country;
use App\Models\Note;
use App\Models\Organisation;
use Livewire\Component;

class Edit extends Component
{
    use WithDispatchBrowserEvents;

    public $organisationId;

    public $name;

    public $subDomain;

    public $street;

    public $place;

    public $postalCode;

    public $countryId;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'subDomain' => 'required|min:3|unique:organisations,subdomain,' . $this->organisationId,
            'street' => 'required',
            'place' => 'required',
            'postalCode' => 'required',
            'countryId' => 'required'
        ];
    }

    protected
        $listeners = ['editOrganisation'];

    public function editOrganisation($organisation)
    {
        $this->organisationId = $organisation['id'];
        $this->name = $organisation['name'];
        $this->subDomain = $organisation['subdomain'];
        $this->street = $organisation['street'];
        $this->place = $organisation['place'];
        $this->postalCode = $organisation['postal_code'];
        $this->countryId = $organisation['country_id'];
    }

    public function update()
    {
        $this->validate();

        Organisation::find($this->organisationId)->update([
            'name' => $this->name,
            'subdomain' => $this->subDomain,
            'street' => $this->street,
            'place' => $this->place,
            'postal_code' => $this->postalCode,
            'country_id' => $this->countryId
        ]);

        $this->dispatchSaved('editOrganisationModal');
    }

    public function render()
    {
        $countries = Country::get(['id', 'name']);

        return view('livewire.admin.organisation.edit', compact('countries'));
    }

}
