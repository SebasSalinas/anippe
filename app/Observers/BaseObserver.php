<?php
/**
 * Project: anippe
 * File: BaseObserver.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 11:53
 */

namespace App\Observers;


use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

 class BaseObserver
{
    public function creating($model)
    {
        //Check if table has column organisation_id, and set it.
        if (Schema::hasColumn($model->getTable(), 'organisation_id')) {
            if (auth()->check()) {
                $model->organisation_id = auth()->user()->organisation_id;
            }
        }

        //Check if table has column organisation_id, and set it.
        if (Schema::hasColumn($model->getTable(), 'creator')) {
            if (auth()->check()) {
                $model->creator_id = auth()->user()->id;
                //$model->creator_type = auth()->user()->id;


            }
        }

        //Check if table has column user_id, and set it.
        if (Schema::hasColumn($model->getTable(), 'user_id')) {
            if (auth()->check()) {
                $model->user_id = auth()->user()->id;
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
