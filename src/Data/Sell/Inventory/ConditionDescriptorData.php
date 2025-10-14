<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Condition Descriptor Data
 *
 * Represents a condition descriptor with name, values, and additional info.
 */
class ConditionDescriptorData extends Data
{
    public function __construct(
        public ?string $name = null,
        public ?array $values = null,
        public ?string $additionalInfo = null,
    ) {}
}
