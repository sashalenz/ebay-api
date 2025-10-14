<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Weight Unit Of Measure Enum
 *
 * Weight measurement units.
 */
enum WeightUnitOfMeasure: string
{
    case POUND = 'POUND';
    case KILOGRAM = 'KILOGRAM';
    case OUNCE = 'OUNCE';
    case GRAM = 'GRAM';

    /**
     * @return array<int, string>
     */
    public static function keys(): array
    {
        return array_map(static fn (self $c): string => $c->value, self::cases());
    }
}
