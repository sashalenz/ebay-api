<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Offer Format Enum
 *
 * Listing format types.
 */
enum OfferFormat: string
{
    case FIXED_PRICE = 'FIXED_PRICE';
    case AUCTION = 'AUCTION';

    /**
     * @return array<int, string>
     */
    public static function keys(): array
    {
        return array_map(static fn (self $c): string => $c->value, self::cases());
    }
}
