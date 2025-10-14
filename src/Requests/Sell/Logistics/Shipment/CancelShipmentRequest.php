<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Logistics\Shipment;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Cancel Shipment Request
 *
 * Cancels a shipment and invalidates the associated shipping label.
 */
class CancelShipmentRequest extends Request
{
    protected string $shipmentId;

    public function __construct(?EbayClient $client, string $shipmentId)
    {
        parent::__construct($client);
        $this->shipmentId = $shipmentId;
    }

    public function endpoint(): string
    {
        return "/sell/logistics/v1_beta/shipment/{$this->shipmentId}/cancel";
    }

    public function method(): string
    {
        return 'POST';
    }
}
