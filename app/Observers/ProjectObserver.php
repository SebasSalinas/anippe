<?php
/**
 * Project: anippe
 * File: ProjectObserver.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 15:18
 */

namespace App\Observers;


use App\Models\Project;

class ProjectObserver extends BaseObserver
{
    public function deleting(Project $model)
    {
        //TODO:: Delete related project data.
    }
}
