<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Feed;

use Sashalenz\EbayApi\Enums\TaskStatus;
use Spatie\LaravelData\Data;

/**
 * Task Data
 *
 * Represents a Feed API task.
 */
class TaskData extends Data
{
    public function __construct(
        public ?string $taskId = null,
        public ?TaskStatus $status = null,
        public ?string $feedType = null,
        public ?string $creationDate = null,
        public ?string $completionDate = null,
        public ?string $schemaVersion = null,
        public ?string $detailHref = null,
        public ?string $uploadSummary = null,
        public ?array $filterCriteria = null,
    ) {}
}
