<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Varies By Data
 *
 * Aspects that vary across items in a group.
 */
class VariesByData extends Data
{
    public function __construct(
        public ?array $specifications = null,
        public ?string $aspectsImageVariesBy = null,
    ) {}
}
