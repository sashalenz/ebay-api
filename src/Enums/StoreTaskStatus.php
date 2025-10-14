<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Store Task Status Enum
 *
 * Possible status values for store category tasks.
 */
enum StoreTaskStatus: string
{
    case PENDING = 'PENDING';
    case IN_PROGRESS = 'IN_PROGRESS';
    case COMPLETED = 'COMPLETED';
    case FAILED = 'FAILED';
}
