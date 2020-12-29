<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;

class Client extends BaseOrganisationModel
{
    public function link()
    {
        return URL::route('base.client.summary', ['client' => $this], ['class' => 'text-bold text-primary']);
    }

    /*
     * Relations
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function groups()
    {
        return $this->belongsToMany(ClientGroup::class, 'link_client_groups', 'client_id', 'group_id')->withTimestamps();
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function tasks()
    {
        return $this->morphMany(Task::class, 'related')->latest();
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'related')->latest();
    }

    public function tickets()
    {
        return $this->morphMany(Ticket::class, 'creator')->latest();
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /*
     * Accessors
     */
    public function getFullAddressAttribute()
    {
        $country = $this->country == null ? '' : $this->country->name;

        return implode(", ", array_filter([$this->address, $this->place, $this->postal_code, $country]));
    }

    public function getLinkedGroupsAttribute()
    {
        return $this->groups->pluck('name')->implode(', ');
    }
}
