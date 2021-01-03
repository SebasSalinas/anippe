<?php
/**
 * Project: anippe
 * File: TicketObserver.php
 * Author: Luka
 * Date: 03.01.2021
 * Time: 18:46
 */

namespace App\Observers;


class TicketObserver extends BaseObserver
{
    public function creating($model)
    {
        parent::creating($model);
    }
}
