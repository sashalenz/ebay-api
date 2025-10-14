<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Data;

/**
 * Line Item Data
 *
 * Individual line item in an order.
 */
class LineItemData extends Data
{
    public function __construct(
        public ?string $lineItemId = null,
        public ?string $legacyItemId = null,
        public ?string $legacyVariationId = null,
        public ?string $sku = null,
        public ?string $title = null,
        public ?array $lineItemCost = null,
        public ?int $quantity = null,
        public ?array $deliveryCost = null,
        public ?array $discountedLineItemCost = null,
        public ?string $lineItemFulfillmentStatus = null,
        public ?array $total = null,
        public ?array $taxes = null,
        public ?array $ebayCollectAndRemitTaxes = null,
    ) {}
}
