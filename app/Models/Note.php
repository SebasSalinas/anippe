<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends BaseOrganisationModel
{
    /*
     * Relations
     */
    public function related()
    {
        return $this->morphTo();
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
