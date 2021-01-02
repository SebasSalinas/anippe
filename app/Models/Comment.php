<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends BaseOrganisationModel
{
    /*
     * Relations
     */
    public function related()
    {
        return $this->morphTo();
    }

    //Creator of comment -> User,Contact
    public function creator()
    {
        return $this->morphTo();
    }
}
