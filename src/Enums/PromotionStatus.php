<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

enum PromotionStatus: string
{
    case DRAFT = 'DRAFT';
    case SCHEDULED = 'SCHEDULED';
    case RUNNING = 'RUNNING';
    case PAUSED = 'PAUSED';
    case ENDED = 'ENDED';
}
