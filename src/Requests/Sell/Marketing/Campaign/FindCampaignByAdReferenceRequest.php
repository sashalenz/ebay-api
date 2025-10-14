<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\CampaignsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Find Campaign By Ad Reference Request
 *
 * Finds campaigns by inventory reference.
 */
class FindCampaignByAdReferenceRequest extends Request
{
    protected ?string $inventoryReferenceId = null;

    protected ?string $inventoryReferenceType = null;

    protected ?string $listingId = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function inventoryReferenceId(string $inventoryReferenceId): self
    {
        $this->inventoryReferenceId = $inventoryReferenceId;

        return $this;
    }

    public function inventoryReferenceType(string $inventoryReferenceType): self
    {
        $this->inventoryReferenceType = $inventoryReferenceType;

        return $this;
    }

    public function listingId(string $listingId): self
    {
        $this->listingId = $listingId;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/ad_campaign/find_campaign_by_ad_reference';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->inventoryReferenceId !== null) {
            $query['inventory_reference_id'] = $this->inventoryReferenceId;
        }

        if ($this->inventoryReferenceType !== null) {
            $query['inventory_reference_type'] = $this->inventoryReferenceType;
        }

        if ($this->listingId !== null) {
            $query['listing_id'] = $this->listingId;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return CampaignsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'campaigns';
    }
}
