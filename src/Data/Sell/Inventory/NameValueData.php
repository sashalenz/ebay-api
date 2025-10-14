<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Name Value Data
 *
 * A name-value pair for compatibility properties.
 */
class NameValueData extends Data
{
    public function __construct(
        public ?string $name = null,
        public ?string $value = null,
    ) {}
}
