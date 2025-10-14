<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Metadata Data
 *
 * Contains metadata information for metrics.
 */
class MetadataData extends Data
{
    public function __construct(
        public ?string $type,
        public ?string $name,
        public ?string $value,
    ) {}
}
