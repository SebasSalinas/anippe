<?php
/**
 * Project: anippe
 * File: ActiveScope.php
 * Author: Luka
 * Date: 03.01.2021
 * Time: 15:17
 */

namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveScope implements Scope
{

    /**
     * @param Builder $builder
     * @param Model $model
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('active', true);
    }
}
