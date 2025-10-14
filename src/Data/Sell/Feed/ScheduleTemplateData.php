<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Feed;

use Spatie\LaravelData\Data;

/**
 * Schedule Template Data
 *
 * Represents a Feed API schedule template.
 */
class ScheduleTemplateData extends Data
{
    public function __construct(
        public ?string $scheduleTemplateId = null,
        public ?string $name = null,
        public ?string $feedType = null,
        public ?string $frequency = null,
        public ?array $supportedConfigurations = null,
    ) {}
}
