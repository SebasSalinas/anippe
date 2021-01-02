<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TaskStatus extends Enum
{
    const NotStarted = 1;
    const InProgress = 2;
    const Testing = 3;
    const AwaitingFeedback = 4;
    const Completed = 5;
}
