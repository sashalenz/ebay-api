<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Aspect Usage Enum
 *
 * Indicates if an aspect is recommended or optional.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:AspectUsageEnum
 */
enum AspectUsage: string
{
    case RECOMMENDED = 'RECOMMENDED';
    case OPTIONAL = 'OPTIONAL';
}
