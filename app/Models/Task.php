<?php

namespace App\Models;

use Illuminate\Support\Carbon;

class Task extends BaseOrganisationModel
{
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
