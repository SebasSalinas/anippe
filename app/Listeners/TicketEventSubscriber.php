<?php
/**
 * Project: anippe
 * File: TicketEventSubscriber.php
 * Author: Luka
 * Date: 03.01.2021
 * Time: 15:38
 */

namespace App\Listeners;


use App\Events\Ticket\TicketCreated;

class TicketEventSubscriber
{
    public function subscribe($events)
    {
        $events->listen(
            TicketCreated::class,
            [TicketEventSubscriber::class, 'handleTicketCreated']
        );
    }

    public function handleTicketCreated($event)
    {
        //handle ticket created
    }
}
