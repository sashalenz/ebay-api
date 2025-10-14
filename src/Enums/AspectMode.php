<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Aspect Mode Enum
 *
 * The manner in which aspect values must be specified.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:AspectModeEnum
 */
enum AspectMode: string
{
    case FREE_TEXT = 'FREE_TEXT';
    case SELECTION_ONLY = 'SELECTION_ONLY';
}
