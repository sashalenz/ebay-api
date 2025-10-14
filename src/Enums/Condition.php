<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Condition Enum
 *
 * Item condition values.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:ConditionEnum
 */
enum Condition: string
{
    case NEW = 'NEW';
    case LIKE_NEW = 'LIKE_NEW';
    case NEW_OTHER = 'NEW_OTHER';
    case NEW_WITH_DEFECTS = 'NEW_WITH_DEFECTS';
    case MANUFACTURER_REFURBISHED = 'MANUFACTURER_REFURBISHED';
    case CERTIFIED_REFURBISHED = 'CERTIFIED_REFURBISHED';
    case EXCELLENT_REFURBISHED = 'EXCELLENT_REFURBISHED';
    case VERY_GOOD_REFURBISHED = 'VERY_GOOD_REFURBISHED';
    case GOOD_REFURBISHED = 'GOOD_REFURBISHED';
    case SELLER_REFURBISHED = 'SELLER_REFURBISHED';
    case USED_EXCELLENT = 'USED_EXCELLENT';
    case USED_VERY_GOOD = 'USED_VERY_GOOD';
    case USED_GOOD = 'USED_GOOD';
    case USED_ACCEPTABLE = 'USED_ACCEPTABLE';
    case FOR_PARTS_OR_NOT_WORKING = 'FOR_PARTS_OR_NOT_WORKING';

    /**
     * @return array<int, string>
     */
    public static function keys(): array
    {
        return array_map(static fn (self $c): string => $c->value, self::cases());
    }
}
