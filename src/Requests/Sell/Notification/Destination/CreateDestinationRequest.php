<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Destination;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\DestinationData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Destination Request
 *
 * Designates an endpoint that will receive notifications.
 */
class CreateDestinationRequest extends Request
{
    protected string $name;

    protected array $deliveryConfig;

    public function __construct(?EbayClient $client, string $name, array $deliveryConfig)
    {
        parent::__construct($client);
        $this->name = $name;
        $this->deliveryConfig = $deliveryConfig;
    }

    public function endpoint(): string
    {
        return '/sell/notification/v1/destination';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'name' => $this->name,
            'deliveryConfig' => $this->deliveryConfig,
        ];
    }

    protected function dto(): ?string
    {
        return DestinationData::class;
    }
}
