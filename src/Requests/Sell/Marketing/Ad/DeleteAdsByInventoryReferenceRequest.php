<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Ads By Inventory Reference Request
 *
 * Deletes ads by inventory reference.
 */
class DeleteAdsByInventoryReferenceRequest extends Request
{
    protected string $campaignId;

    protected string $inventoryReferenceId;

    protected string $inventoryReferenceType;

    public function __construct(?EbayClient $client, string $campaignId, string $inventoryReferenceId, string $inventoryReferenceType)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->inventoryReferenceId = $inventoryReferenceId;
        $this->inventoryReferenceType = $inventoryReferenceType;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/delete_ads_by_inventory_reference";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'inventoryReferenceId' => $this->inventoryReferenceId,
            'inventoryReferenceType' => $this->inventoryReferenceType,
        ];
    }
}
