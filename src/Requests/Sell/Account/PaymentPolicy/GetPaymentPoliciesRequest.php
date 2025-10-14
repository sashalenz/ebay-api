<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\PaymentPolicy;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\PaymentPoliciesData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payment Policies Request
 *
 * Retrieves all the payment policies associated with the seller's account for the specified marketplace.
 */
class GetPaymentPoliciesRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/payment_policy';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return [
            'marketplace_id' => $this->marketplaceId->value,
        ];
    }

    protected function dto(): ?string
    {
        return PaymentPoliciesData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'paymentPolicies';
    }
}
