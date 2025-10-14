<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Catalog;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Product Search Response Data
 *
 * Search results from the Catalog API.
 */
class ProductSearchResponseData extends Data
{
    public function __construct(
        #[DataCollectionOf(ProductSummaryData::class)]
        public ?DataCollection $productSummaries = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
        public ?int $total = null,
    ) {}
}
