<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Sashalenz\EbayApi\Enums\TimeDurationUnit;
use Spatie\LaravelData\Data;

/**
 * Time Duration Data
 *
 * Represents a time duration with unit and value.
 */
class TimeDurationData extends Data
{
    public function __construct(
        public ?TimeDurationUnit $unit = null,
        public ?int $value = null,
    ) {}
}
