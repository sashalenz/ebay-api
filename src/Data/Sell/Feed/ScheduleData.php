<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Feed;

use Sashalenz\EbayApi\Enums\ScheduleStatus;
use Spatie\LaravelData\Data;

/**
 * Schedule Data
 *
 * Represents a Feed API schedule.
 */
class ScheduleData extends Data
{
    public function __construct(
        public ?string $scheduleId = null,
        public ?string $scheduleName = null,
        public ?string $feedType = null,
        public ?ScheduleStatus $status = null,
        public ?string $scheduleTemplateId = null,
        public ?string $schemaVersion = null,
        public ?string $preferredTriggerDayOfWeek = null,
        public ?string $preferredTriggerHour = null,
        public ?string $preferredTriggerDayOfMonth = null,
    ) {}
}
