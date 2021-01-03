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
use App\Events\Ticket\TicketReply;
use App\Models\Contact;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketService
{
    public function createTicket(Request $request)
    {
        $ticket = auth()->user()->tickets()->create($request->all());

        event(new TicketCreated($ticket));

        return $ticket;
    }

    public function addPortalReply(Request $request, Ticket $ticket)
    {
        $isContact = auth()->user() instanceof Contact;

        $ticket->replies()->create([
            'content' => $request->reply,
            'creator_id' => auth()->user()->id,
            'creator_type' => $isContact ? 'contact' : 'user', //TODO:: This is not good!!
        ]);

        event(new TicketReply($ticket));
    }

}
