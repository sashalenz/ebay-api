<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Operating Hours Data
 *
 * Operating hours for a location.
 */
class OperatingHoursData extends Data
{
    public function __construct(
        public ?string $dayOfWeekEnum = null,
        #[DataCollectionOf(IntervalData::class)]
        public ?DataCollection $intervals = null,
    ) {}
}
