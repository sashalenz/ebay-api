<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Stores;

use Sashalenz\EbayApi\Enums\StoreTaskStatus;
use Spatie\LaravelData\Data;

/**
 * Store Task Data
 *
 * Status information for a store category task.
 */
class StoreTaskData extends Data
{
    public function __construct(
        public ?string $taskId = null,
        public ?string $taskType = null,
        public ?StoreTaskStatus $status = null,
        public ?string $creationDate = null,
        public ?string $completionDate = null,
        public ?string $message = null,
    ) {}
}
