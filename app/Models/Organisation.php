<?php

namespace App\Models;

use App\Observers\BaseObserver;
use App\Scopes\OrganisationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class Organisation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::observe(new BaseObserver());
    }

    /*
     * Methods
     */
    public function link()
    {
        return URL::route('admin.organisations.show', ['organisation' => $this], ['class' => 'text-bold text-primary']);
    }

    /*
     * Relations
     */
    public function users()
    {
        return $this->hasMany(User::class, 'organisation_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /*
     * Accessors
     */
    public function getFullAddressAttribute()
    {
        $country = $this->country == null ? '' : $this->country->name;

        return implode(", ", array_filter([$this->street, $this->place, $this->postal_code, $country]));
    }

    public function getCreatedAtAttribute($timestamp)
    {
        if ($timestamp == null) return;

        return Carbon::parse($timestamp)->format('d.m.Y H:m');
    }
}
