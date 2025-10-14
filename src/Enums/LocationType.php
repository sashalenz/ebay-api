<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Location Type Enum
 *
 * Types of inventory locations.
 */
enum LocationType: string
{
    case WAREHOUSE = 'WAREHOUSE';
    case STORE = 'STORE';
}
