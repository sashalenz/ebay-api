<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Publish Offer By Inventory Item Group Request
 *
 * Publishes an offer for an inventory item group.
 */
class PublishOfferByInventoryItemGroupRequest extends Request
{
    protected string $inventoryItemGroupKey;

    protected MarketplaceId $marketplaceId;

    public function __construct(?EbayClient $client, string $inventoryItemGroupKey, MarketplaceId $marketplaceId)
    {
        parent::__construct($client);
        $this->inventoryItemGroupKey = $inventoryItemGroupKey;
        $this->marketplaceId = $marketplaceId;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/offer/publish_by_inventory_item_group';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'inventoryItemGroupKey' => $this->inventoryItemGroupKey,
            'marketplaceId' => $this->marketplaceId->value,
        ];
    }
}
