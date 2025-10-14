<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Logistics\Shipment;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Logistics\ShipmentData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Shipment Request
 *
 * Retrieves details of a shipment.
 */
class GetShipmentRequest extends Request
{
    protected string $shipmentId;

    public function __construct(?EbayClient $client, string $shipmentId)
    {
        parent::__construct($client);
        $this->shipmentId = $shipmentId;
    }

    public function endpoint(): string
    {
        return "/sell/logistics/v1_beta/shipment/{$this->shipmentId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ShipmentData::class;
    }
}
