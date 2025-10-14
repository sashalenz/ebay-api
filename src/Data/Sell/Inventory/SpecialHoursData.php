<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Special Hours Data
 *
 * Special operating hours for specific dates.
 */
class SpecialHoursData extends Data
{
    public function __construct(
        public ?string $date = null,
        #[DataCollectionOf(IntervalData::class)]
        public ?DataCollection $intervals = null,
    ) {}
}
