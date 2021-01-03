<?php

namespace App\Models;

use App\Enums\TicketStatus;
use Illuminate\Support\Facades\URL;

class Ticket extends BaseOrganisationModel
{
    protected $attributes = [
        'status_id' => TicketStatus::Open
    ];

    /*
     * Methods
     */
    public function link()
    {
        return URL::route('base.tickets.show', ['ticket' => $this], ['class' => 'text-bold text-primary']);
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


}
