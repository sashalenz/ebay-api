<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Subscription;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\SubscriptionFilterData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Subscription Filter Request
 *
 * Retrieves details of a notification topic subscription filter.
 */
class GetSubscriptionFilterRequest extends Request
{
    protected string $subscriptionId;

    protected string $filterId;

    public function __construct(?EbayClient $client, string $subscriptionId, string $filterId)
    {
        parent::__construct($client);
        $this->subscriptionId = $subscriptionId;
        $this->filterId = $filterId;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/subscription/{$this->subscriptionId}/filter/{$this->filterId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return SubscriptionFilterData::class;
    }
}
