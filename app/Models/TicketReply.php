<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends BaseOrganisationModel
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ticket()->update([
                'last_reply_at' => now()
            ]);
        });
    }

    /*
     * Relations
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function creator()
    {
        return $this->morphTo();
    }

    /*
     * Methods
     */

    /*
     * Accessors
     */

    /*
     * Mutators
     */
}
