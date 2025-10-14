<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Subscription;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Subscription Request
 *
 * Makes one or more changes to a notification topic subscription.
 */
class UpdateSubscriptionRequest extends Request
{
    protected string $subscriptionId;

    protected ?string $destinationId = null;

    protected ?string $status = null;

    public function __construct(?EbayClient $client, string $subscriptionId)
    {
        parent::__construct($client);
        $this->subscriptionId = $subscriptionId;
    }

    public function destinationId(string $destinationId): self
    {
        $this->destinationId = $destinationId;

        return $this;
    }

    public function status(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/subscription/{$this->subscriptionId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        $body = [];

        if ($this->destinationId !== null) {
            $body['destinationId'] = $this->destinationId;
        }

        if ($this->status !== null) {
            $body['status'] = $this->status;
        }

        return $body;
    }
}
