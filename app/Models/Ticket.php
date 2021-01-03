<?php

namespace App\Models;

use App\Enums\Priority;
use App\Enums\TicketStatus;
use App\Observers\TicketObserver;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class Ticket extends BaseOrganisationModel
{
    protected $attributes = [
        'status_id' => TicketStatus::Open
    ];

    public static function boot()
    {
        parent::boot();

        parent::observe(new TicketObserver());
    }

    /*
     * Methods
     */
    public function link()
    {
        return URL::route('base.tickets.show', ['ticket' => $this], ['class' => 'text-bold text-primary']);
    }

    public function portalLink()
    {
        return URL::route('portal.tickets.show', ['ticket' => $this], ['class' => 'text-bold text-primary']);
    }

    /*
     * Relations
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function creator()
    {
        return $this->morphTo();
    }

    public function department()
    {
        return $this->belongsTo(TicketDepartment::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function replies()
    {
        return $this->hasMany(TicketReply::class)->latest();
    }

    public function assigned()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    /*
     * Accessors
     */
    public function getPriorityAttribute()
    {
        return Priority::getDescription($this->priority_id);
    }

    public function getStatusAttribute()
    {
        return TicketStatus::getDescription($this->status_id);
    }

    public function getLastReplyAtAttribute($timestamp)
    {
        if ($timestamp == null) return;

        return Carbon::parse($timestamp)->format('d.m.Y H:m');
    }


}
