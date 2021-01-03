<?php
/**
 * Project: anippe
 * File: TicketService.php
 * Author: Luka
 * Date: 03.01.2021
 * Time: 15:27
 */

namespace App\Services;


use App\Events\Ticket\TicketCreated;
use Illuminate\Http\Request;

class TicketService
{
    public function createTicket(Request $request)
    {
        $ticket = auth()->user()->tickets()->create($request->all());

        event(new TicketCreated($ticket));

        return $ticket;
    }

}
