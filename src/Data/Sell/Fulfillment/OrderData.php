<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Order Data
 *
 * Complete order information.
 */
class OrderData extends Data
{
    public function __construct(
        public ?string $orderId = null,
        public ?string $legacyOrderId = null,
        public ?string $orderFulfillmentStatus = null,
        public ?string $orderPaymentStatus = null,
        public ?string $creationDate = null,
        public ?string $lastModifiedDate = null,
        public ?array $pricingSummary = null,
        public ?array $buyer = null,
        public ?array $buyerCheckoutNotes = null,
        #[DataCollectionOf(LineItemData::class)]
        public ?DataCollection $lineItems = null,
        public ?array $fulfillmentStartInstructions = null,
        public ?array $paymentSummary = null,
        public ?string $salesRecordReference = null,
        public ?int $totalFeeBasisAmount = null,
        public ?int $totalMarketplaceFee = null,
    ) {}
}
