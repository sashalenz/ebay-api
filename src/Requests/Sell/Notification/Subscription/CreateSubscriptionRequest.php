<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Subscription;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\SubscriptionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Subscription Request
 *
 * Subscribes a user to a notification topic.
 */
class CreateSubscriptionRequest extends Request
{
    protected string $topicId;

    protected string $destinationId;

    public function __construct(?EbayClient $client, string $topicId, string $destinationId)
    {
        parent::__construct($client);
        $this->topicId = $topicId;
        $this->destinationId = $destinationId;
    }

    public function endpoint(): string
    {
        return '/sell/notification/v1/subscription';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'topicId' => $this->topicId,
            'destinationId' => $this->destinationId,
        ];
    }

    protected function dto(): ?string
    {
        return SubscriptionData::class;
    }
}
