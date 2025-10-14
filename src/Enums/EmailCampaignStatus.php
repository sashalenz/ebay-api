<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

enum EmailCampaignStatus: string
{
    case DRAFT = 'DRAFT';
    case SCHEDULED = 'SCHEDULED';
    case SENT = 'SENT';
    case CANCELED = 'CANCELED';
}
