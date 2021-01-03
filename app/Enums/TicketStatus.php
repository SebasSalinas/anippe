<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class TicketStatus extends Enum
{
    const Open = 1;
    const InProgress = 2;
    const Answered = 3;
    const OnHold = 4;
    const Closed = 5;
}
