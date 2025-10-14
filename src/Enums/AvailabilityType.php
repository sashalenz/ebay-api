<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Availability Type Enum
 *
 * Availability status for inventory items.
 */
enum AvailabilityType: string
{
    case IN_STOCK = 'IN_STOCK';
    case OUT_OF_STOCK = 'OUT_OF_STOCK';
    case SHIP_TO_STORE = 'SHIP_TO_STORE';
}
