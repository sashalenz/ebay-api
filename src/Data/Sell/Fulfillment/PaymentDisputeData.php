<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Data;

/**
 * Payment Dispute Data
 *
 * Payment dispute information.
 */
class PaymentDisputeData extends Data
{
    public function __construct(
        public ?string $paymentDisputeId = null,
        public ?string $orderId = null,
        public ?string $openDate = null,
        public ?string $respondByDate = null,
        public ?string $status = null,
        public ?string $reason = null,
        public ?array $monetaryTransactions = null,
        public ?array $buyer = null,
        public ?array $evidence = null,
        public ?array $lineItems = null,
    ) {}
}
