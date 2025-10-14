<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Subscription;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Subscription Request
 *
 * Deletes a notification topic subscription.
 */
class DeleteSubscriptionRequest extends Request
{
    protected string $subscriptionId;

    public function __construct(?EbayClient $client, string $subscriptionId)
    {
        parent::__construct($client);
        $this->subscriptionId = $subscriptionId;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/subscription/{$this->subscriptionId}";
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
