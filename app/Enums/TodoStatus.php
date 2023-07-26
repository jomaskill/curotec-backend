<?php

namespace App\Enums;

enum TodoStatus: string
{
    case COMPLETED = 'Completed';
    case INCOMPLETE = 'Incomplete';
    case UNSET = 'Unset';
}
