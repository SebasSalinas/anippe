<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class Organisation extends Model
{
    use HasFactory, SoftDeletes;

    /*
     * Methods
     */
    public function link()
    {
        return URL::route('admin.organisations.show', ['organisation' => $this], ['class' => 'text-bold text-primary']);
    }
}
