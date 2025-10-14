<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Negotiation;

use Spatie\LaravelData\Data;

/**
 * Send Offer Response Data
 *
 * Response from sending offers to interested buyers.
 */
class SendOfferResponseData extends Data
{
    public function __construct(
        public ?string $offerId = null,
    ) {}
}
