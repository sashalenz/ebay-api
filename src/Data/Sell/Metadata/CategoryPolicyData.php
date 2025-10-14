<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Metadata;

use Spatie\LaravelData\Data;

/**
 * Category Policy Data
 *
 * Category policy information.
 */
class CategoryPolicyData extends Data
{
    public function __construct(
        public ?string $categoryId = null,
        public ?string $categoryTreeId = null,
    ) {}
}
