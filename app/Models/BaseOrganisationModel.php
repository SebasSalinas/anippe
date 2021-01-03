<?php
/**
 * Project: anippe
 * File: BaseModel.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 10:06
 */

namespace App\Models;


use App\Traits\Organisationable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BaseOrganisationModel extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, SoftDeletes, Organisationable, InteractsWithMedia;

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getCreatedAtAttribute($timestamp)
    {
        if ($timestamp == null) return;

        return Carbon::parse($timestamp)->format('d.m.Y H:i');
    }

    public function getUpdatedAtAttribute($timestamp)
    {
        if ($timestamp == null) return;

        return Carbon::parse($timestamp)->format('d.m.Y H:i');
    }
}
