<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Length Unit Of Measure Enum
 *
 * Length measurement units.
 */
enum LengthUnitOfMeasure: string
{
    case INCH = 'INCH';
    case FEET = 'FEET';
    case CENTIMETER = 'CENTIMETER';
    case METER = 'METER';

    /**
     * @return array<int, string>
     */
    public static function keys(): array
    {
        return array_map(static fn (self $c): string => $c->value, self::cases());
    }
}
