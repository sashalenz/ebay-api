<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Aspect Data Type Enum
 *
 * The data type of the aspect value.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:AspectDataTypeEnum
 */
enum AspectDataType: string
{
    case DATE = 'DATE';
    case NUMBER = 'NUMBER';
    case STRING = 'STRING';
    case STRING_ARRAY = 'STRING_ARRAY';
}
