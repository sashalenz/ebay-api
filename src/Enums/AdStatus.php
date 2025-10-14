<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

enum AdStatus: string
{
    case ACTIVE = 'ACTIVE';
    case PAUSED = 'PAUSED';
    case ARCHIVED = 'ARCHIVED';
}
