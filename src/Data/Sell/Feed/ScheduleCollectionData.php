<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Feed;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Schedule Collection Data
 *
 * Collection of Feed API schedules.
 */
class ScheduleCollectionData extends Data
{
    public function __construct(
        #[DataCollectionOf(ScheduleData::class)]
        public ?DataCollection $schedules = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $total = null,
    ) {}
}
