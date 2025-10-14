<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

enum FundingStrategy: string
{
    case COST_PER_SALE = 'COST_PER_SALE';
    case COST_PER_CLICK = 'COST_PER_CLICK';
}
