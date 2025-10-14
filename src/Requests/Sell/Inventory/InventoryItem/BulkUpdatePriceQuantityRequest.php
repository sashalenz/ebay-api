<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\AvailabilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PricingSummaryData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Bulk Update Price Quantity Request
 *
 * Updates price and/or quantity for up to 25 inventory items.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/methods/bulkUpdatePriceQuantity
 */
class BulkUpdatePriceQuantityRequest extends Request
{
    /**
     * @var array<array{sku: string, availability?: AvailabilityData, pricingSummary?: PricingSummaryData}>
     */
    protected array $requests = [];

    /**
     * Create a new Bulk Update Price Quantity request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     */
    public function __construct(?EbayClient $client)
    {
        parent::__construct($client);
    }

    /**
     * Add an update request
     */
    public function addRequest(
        string $sku,
        ?AvailabilityData $availability = null,
        ?PricingSummaryData $pricingSummary = null
    ): self {
        $request = ['sku' => $sku];

        if ($availability !== null) {
            $request['availability'] = $availability->toArray();
        }

        if ($pricingSummary !== null) {
            $request['pricingSummary'] = $pricingSummary->toArray();
        }

        $this->requests[] = $request;

        return $this;
    }

    /**
     * Validate the request before sending
     *
     * @return array<string>
     */
    protected function validate(): array
    {
        $errors = [];

        if (empty($this->requests)) {
            $errors[] = 'At least one update request is required';
        }

        if (count($this->requests) > 25) {
            $errors[] = 'Maximum 25 items allowed per request';
        }

        return $errors;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/sell/inventory/v1/bulk_update_price_quantity';
    }

    /**
     * Get the HTTP method for this request
     */
    public function method(): string
    {
        return 'POST';
    }

    /**
     * Get the request body
     */
    public function body(): array
    {
        return [
            'requests' => $this->requests,
        ];
    }
}
