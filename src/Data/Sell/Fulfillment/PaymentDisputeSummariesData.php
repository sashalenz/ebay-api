<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Payment Dispute Summaries Data
 *
 * Collection of payment dispute summaries.
 */
class PaymentDisputeSummariesData extends Data
{
    public function __construct(
        #[DataCollectionOf(PaymentDisputeData::class)]
        public ?DataCollection $paymentDisputes = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
        public ?int $total = null,
    ) {}
}
