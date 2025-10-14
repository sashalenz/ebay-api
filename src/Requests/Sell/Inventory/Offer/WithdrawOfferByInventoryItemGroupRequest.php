<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Withdraw Offer By Inventory Item Group Request
 *
 * Withdraws offers for an inventory item group.
 */
class WithdrawOfferByInventoryItemGroupRequest extends Request
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
        return '/sell/inventory/v1/offer/withdraw_by_inventory_item_group';
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
