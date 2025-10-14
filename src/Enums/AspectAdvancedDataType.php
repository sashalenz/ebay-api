<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Aspect Advanced Data Type Enum
 *
 * Indicates additional data type requirements for the aspect.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:AspectAdvancedDataTypeEnum
 */
enum AspectAdvancedDataType: string
{
    case NUMERIC_RANGE = 'NUMERIC_RANGE';
}
