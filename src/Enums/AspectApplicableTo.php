<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Aspect Applicable To Enum
 *
 * Indicates if the aspect is applicable to an item or product.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:AspectApplicableToEnum
 */
enum AspectApplicableTo: string
{
    case ITEM = 'ITEM';
    case PRODUCT = 'PRODUCT';
}
