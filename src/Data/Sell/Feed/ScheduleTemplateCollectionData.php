<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Feed;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Schedule Template Collection Data
 *
 * Collection of Feed API schedule templates.
 */
class ScheduleTemplateCollectionData extends Data
{
    public function __construct(
        #[DataCollectionOf(ScheduleTemplateData::class)]
        public ?DataCollection $scheduleTemplates = null,
        public ?int $total = null,
    ) {}
}
