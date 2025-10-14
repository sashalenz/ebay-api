<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Schedule Status Enum
 *
 * Status values for Feed API schedules.
 */
enum ScheduleStatus: string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}
