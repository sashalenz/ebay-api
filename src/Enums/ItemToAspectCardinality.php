<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Item To Aspect Cardinality Enum
 *
 * Indicates whether an aspect accepts single or multiple values.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:ItemToAspectCardinalityEnum
 */
enum ItemToAspectCardinality: string
{
    case SINGLE = 'SINGLE';
    case MULTI = 'MULTI';
}
