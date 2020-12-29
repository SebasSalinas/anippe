<?php
/**
 * Project: anippe
 * File: Organisationable.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 11:52
 */

namespace App\Traits;


use App\Models\Organisation;
use App\Observers\BaseObserver;
use App\Scopes\OrganisationScope;

trait Organisationable
{
    public static function bootOrganisationable()
    {
        static::addGlobalScope(new OrganisationScope());
        static::observe(new BaseObserver());
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
}
