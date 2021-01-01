<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class Task extends BaseOrganisationModel
{
    protected $attributes = [
        'status_id' => 1,
        'priority_id' => 1,
    ];

    /*
     * Methods
     */
    public function link()
    {
        return URL::route('base.tasks.show', ['task' => $this], ['class' => 'text-bold text-primary']);
    }

    /*
     * Relations
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'link_task_users', 'task_id', 'user_id')->withTimestamps();
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


}
