<?php

namespace App\Models;

use App\Enums\Priority;
use App\Enums\TaskStatus;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class Task extends BaseOrganisationModel
{
    protected $attributes = [
        'status_id' => TaskStatus::NotStarted,
        'priority_id' => Priority::Low,
    ];

    /*
     * Methods
     */
    public function link()
    {
        return URL::route('base.tasks.show', ['task' => $this], ['class' => 'text-bold text-primary']);
    }

    public function relatedLink()
    {

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
    public function getStartAtAttribute($timestamp)
    {
        if ($timestamp == null) return;

        return Carbon::parse($timestamp)->format('d.m.Y');
    }

    public function getDeadlineAtAttribute($timestamp)
    {
        if ($timestamp == null) return;

        return Carbon::parse($timestamp)->format('d.m.Y');
    }

    public function getMembersAttribute()
    {
        return $this->users->pluck('first_name')->implode(', ');
    }


}
