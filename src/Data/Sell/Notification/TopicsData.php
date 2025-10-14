<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Topics Data
 *
 * Collection of notification topics.
 */
class TopicsData extends Data
{
    public function __construct(
        #[DataCollectionOf(TopicData::class)]
        public ?DataCollection $topics = null,
        public ?int $total = null,
    ) {}
}
