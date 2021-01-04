<?php
/**
 * Project: anippe
 * File: BaseModel.php
 * Author: Luka
 * Date: 04.01.2021
 * Time: 11:09
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

abstract class BaseModel extends Model implements HasMedia
{
    use LogsActivity, SoftDeletes, HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This item has been {$eventName}";
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
