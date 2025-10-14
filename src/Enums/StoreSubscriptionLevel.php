<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Store Subscription Level Enum
 *
 * eBay Store subscription levels.
 */
enum StoreSubscriptionLevel: string
{
    case BASIC = 'BASIC';
    case PREMIUM = 'PREMIUM';
    case ANCHOR = 'ANCHOR';
    case STARTER = 'STARTER';
}
