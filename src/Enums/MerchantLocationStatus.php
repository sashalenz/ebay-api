<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Merchant Location Status Enum
 *
 * Status values for inventory locations.
 */
enum MerchantLocationStatus: string
{
    case ENABLED = 'ENABLED';
    case DISABLED = 'DISABLED';
}
