<?php
/**
 * Project: anippe
 * File: BaseObserver.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 11:53
 */

namespace App\Observers;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class BaseObserver
{
    public function creating($model)
    {
        //Check if table has column organisation_id, and set it.
        if (Schema::hasColumn($model->getTable(), 'organisation_id')) {
            if (session()->has('organisation_id')) {
                $model->organisation_id = session('organisation_id');
            }
        }

        //Generate UUID for each table
        if (Schema::hasColumn($model->getTable(), 'uuid')) {
            $uuid = Str::uuid();
            while ($model::where('uuid', '=', $uuid)->count() > 0) {
                $uid = Str::uuid();
            }
            $model->uuid = $uuid;
        }

    }
}
