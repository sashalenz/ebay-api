<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Subscription;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Enable Subscription Request
 *
 * Enables a previously disabled notification topic subscription.
 */
class EnableSubscriptionRequest extends Request
{
    protected string $subscriptionId;

    public function __construct(?EbayClient $client, string $subscriptionId)
    {
        parent::__construct($client);
        $this->subscriptionId = $subscriptionId;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/subscription/{$this->subscriptionId}/enable";
    }

    public function method(): string
    {
        return 'POST';
    }
}
