<?php
/**
 * Project: anippe
 * File: OrganisationScope.php
 * Author: Luka
 * Date: 26.12.2020
 * Time: 11:52
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrganisationScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (session()->has('organisation_id')) {
            $builder->where($model->getTable() . '.organisation_id', session('organisation_id'));
        }
    }
}

