<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum HeaderPlatform: string
{
    use InvokableCases, Values;

    case WEB = 'web';
    case MOBILE = 'mobile';
}
