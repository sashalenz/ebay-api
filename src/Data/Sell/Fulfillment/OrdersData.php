<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Orders Data
 *
 * Collection of orders.
 */
class OrdersData extends Data
{
    public function __construct(
        #[DataCollectionOf(OrderData::class)]
        public ?DataCollection $orders = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
        public ?int $total = null,
        public ?array $warnings = null,
    ) {}
}
