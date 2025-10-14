<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Subscription;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Test Subscription Request
 *
 * Sends a test notification to a user's destination endpoint for a notification topic subscription.
 */
class TestSubscriptionRequest extends Request
{
    protected string $subscriptionId;

    public function __construct(?EbayClient $client, string $subscriptionId)
    {
        parent::__construct($client);
        $this->subscriptionId = $subscriptionId;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/subscription/{$this->subscriptionId}/test";
    }

    public function method(): string
    {
        return 'POST';
    }
}
