<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Feed;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Task Collection Data
 *
 * Collection of Feed API tasks.
 */
class TaskCollectionData extends Data
{
    public function __construct(
        #[DataCollectionOf(TaskData::class)]
        public ?DataCollection $tasks = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
        public ?int $total = null,
    ) {}
}
