<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

enum CampaignStatus: string
{
    case RUNNING = 'RUNNING';
    case PAUSED = 'PAUSED';
    case ENDED = 'ENDED';
    case SCHEDULED = 'SCHEDULED';
}
