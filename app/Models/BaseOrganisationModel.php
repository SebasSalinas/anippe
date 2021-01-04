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

class BaseOrganisationModel extends BaseModel
{
    use Organisationable;

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
