<?php

namespace App\Models;

use App\ActiveScope;

class TicketDepartment extends BaseOrganisationModel
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }
}
