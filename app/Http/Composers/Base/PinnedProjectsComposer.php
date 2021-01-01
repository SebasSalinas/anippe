<?php
/**
 * Project: anippe
 * File: PinnedProjectsComposer.php
 * Author: Luka
 * Date: 27.12.2020
 * Time: 22:14
 */

namespace App\Http\Composers\Base;


use Illuminate\View\View;

class PinnedProjectsComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $pinnedProjects = auth()->user()
            ->pinnedProjects()
            ->get([
                'projects.id', 'projects.uuid', 'projects.name'
            ]);

        $view->with('pinnedProjects', $pinnedProjects);
    }
}
