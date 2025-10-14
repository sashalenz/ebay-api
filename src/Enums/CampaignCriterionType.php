<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

enum CampaignCriterionType: string
{
    case INVENTORY_PARTITION = 'INVENTORY_PARTITION';
    case INVENTORY_BY_RULE = 'INVENTORY_BY_RULE';
}
