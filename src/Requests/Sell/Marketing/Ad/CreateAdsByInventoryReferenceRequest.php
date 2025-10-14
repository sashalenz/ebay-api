<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Ad;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\AdsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Ads By Inventory Reference Request
 *
 * Creates ads using inventory references.
 */
class CreateAdsByInventoryReferenceRequest extends Request
{
    protected string $campaignId;

    protected array $inventoryReferences;

    public function __construct(?EbayClient $client, string $campaignId, array $inventoryReferences)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->inventoryReferences = $inventoryReferences;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/create_ads_by_inventory_reference";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return ['inventoryReferences' => $this->inventoryReferences];
    }

    protected function dto(): ?string
    {
        return AdsData::class;
    }
}
