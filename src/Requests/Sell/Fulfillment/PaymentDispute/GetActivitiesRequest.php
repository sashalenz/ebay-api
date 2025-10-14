<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Fulfillment\PaymentDispute;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Fulfillment\DisputeActivityData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Activities Request
 *
 * Retrieves a log of activity for a payment dispute.
 */
class GetActivitiesRequest extends Request
{
    protected string $paymentDisputeId;

    public function __construct(?EbayClient $client, string $paymentDisputeId)
    {
        parent::__construct($client);
        $this->paymentDisputeId = $paymentDisputeId;
    }

    public function endpoint(): string
    {
        return "/sell/fulfillment/v1/payment_dispute/{$this->paymentDisputeId}/activity";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return DisputeActivityData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'activity';
    }
}
