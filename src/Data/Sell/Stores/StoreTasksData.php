<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Stores;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Store Tasks Data
 *
 * Collection of store tasks with pagination.
 */
class StoreTasksData extends Data
{
    public function __construct(
        #[DataCollectionOf(StoreTaskData::class)]
        public ?DataCollection $tasks = null,
        public ?int $total = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
    ) {}
}
