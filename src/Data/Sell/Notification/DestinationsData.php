<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Destinations Data
 *
 * Collection of notification destinations.
 */
class DestinationsData extends Data
{
    public function __construct(
        #[DataCollectionOf(DestinationData::class)]
        public ?DataCollection $destinations = null,
        public ?int $total = null,
    ) {}
}
