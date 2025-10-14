<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Stores;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Store Categories Data
 *
 * Collection of store categories with pagination.
 */
class StoreCategoriesData extends Data
{
    public function __construct(
        #[DataCollectionOf(StoreCategoryData::class)]
        public ?DataCollection $categories = null,
        public ?int $total = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
    ) {}
}
