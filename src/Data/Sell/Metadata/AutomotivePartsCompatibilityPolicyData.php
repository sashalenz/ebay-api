<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Metadata;

use Spatie\LaravelData\Data;

/**
 * Automotive Parts Compatibility Policy Data
 *
 * Automotive parts compatibility policy information for categories.
 */
class AutomotivePartsCompatibilityPolicyData extends Data
{
    public function __construct(
        public ?string $categoryId = null,
        public ?string $categoryTreeId = null,
    ) {}
}
