<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Subscription;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\SubscriptionFilterData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Subscription Filter Request
 *
 * Creates a filter for a notification topic subscription.
 */
class CreateSubscriptionFilterRequest extends Request
{
    protected string $subscriptionId;

    protected string $filterType;

    protected array $criteria;

    public function __construct(?EbayClient $client, string $subscriptionId, string $filterType, array $criteria)
    {
        parent::__construct($client);
        $this->subscriptionId = $subscriptionId;
        $this->filterType = $filterType;
        $this->criteria = $criteria;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/subscription/{$this->subscriptionId}/filter";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'filterType' => $this->filterType,
            'criteria' => $this->criteria,
        ];
    }

    protected function dto(): ?string
    {
        return SubscriptionFilterData::class;
    }
}
