<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Time Duration Unit Enum
 *
 * Time duration units for fulfillment time.
 */
enum TimeDurationUnit: string
{
    case YEAR = 'YEAR';
    case MONTH = 'MONTH';
    case DAY = 'DAY';
    case HOUR = 'HOUR';
    case CALENDAR_DAY = 'CALENDAR_DAY';
    case BUSINESS_DAY = 'BUSINESS_DAY';
    case MINUTE = 'MINUTE';
    case SECOND = 'SECOND';
    case MILLISECOND = 'MILLISECOND';
}
