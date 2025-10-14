<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\AdsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Ads By Inventory Reference Request
 *
 * Retrieves ads by inventory reference.
 */
class GetAdsByInventoryReferenceRequest extends Request
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
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/get_ads_by_inventory_reference";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return [
            'inventory_reference_id' => $this->inventoryReferenceId,
            'inventory_reference_type' => $this->inventoryReferenceType,
        ];
    }

    protected function dto(): ?string
    {
        return AdsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'ads';
    }
}
