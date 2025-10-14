<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Logistics\Shipment;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Download Label File Request
 *
 * Downloads the eBay shipping label for a shipment in PDF format.
 */
class DownloadLabelFileRequest extends Request
{
    protected string $shipmentId;

    public function __construct(?EbayClient $client, string $shipmentId)
    {
        parent::__construct($client);
        $this->shipmentId = $shipmentId;
    }

    public function endpoint(): string
    {
        return "/sell/logistics/v1_beta/shipment/{$this->shipmentId}/download_label_file";
    }

    public function method(): string
    {
        return 'GET';
    }
}
