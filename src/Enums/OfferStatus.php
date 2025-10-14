<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Offer Status Enum
 *
 * Status values for offers.
 */
enum OfferStatus: string
{
    case PUBLISHED = 'PUBLISHED';
    case UNPUBLISHED = 'UNPUBLISHED';
    case OUT_OF_STOCK = 'OUT_OF_STOCK';
    case ENDED = 'ENDED';

    /**
     * @return array<int, string>
     */
    public static function keys(): array
    {
        return array_map(static fn (self $c): string => $c->value, self::cases());
    }
}
