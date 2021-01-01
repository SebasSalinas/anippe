<?php

namespace App\Models;

use App\Observers\ProjectObserver;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class Project extends BaseOrganisationModel
{
    protected $dates = ['starting_at', 'deadline_at'];

    protected static function boot()
    {
        parent::boot();

        parent::observe(new ProjectObserver());
    }

    /*
     * Methods
     */
    public function link()
    {
        return URL::route('base.project.summary', ['project' => $this], ['class' => 'text-bold text-primary']);
    }

    /*
     * Relations
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'link_project_users', 'project_id', 'user_id')->withTimestamps();
    }

    public function pinnedForUsers()
    {
        return $this->belongsToMany(User::class, 'link_user_pinned_projects', 'project_id', 'user_id')->withTimestamps();
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'related')->latest();
    }

    public function tasks()
    {
        return $this->morphMany(Task::class, 'related')->latest();
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'project_id')->latest();
    }

    /*
     * Accessors
     */
    public function getStartingAtAttribute($timestamp)
    {
        if ($timestamp == null) return;

        return Carbon::parse($timestamp)->format('d.m.Y H:m');
    }

    public function getDeadlineAtAttribute($timestamp)
    {
        if ($timestamp == null) return;

        return Carbon::parse($timestamp)->format('d.m.Y H:m');
    }

    public function getMembersAttribute()
    {
        return $this->users->pluck('first_name')->implode(', ');
    }

    /*
     * Mutators
     */


}
