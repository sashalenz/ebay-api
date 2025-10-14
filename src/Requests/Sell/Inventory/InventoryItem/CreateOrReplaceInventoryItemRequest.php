<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\AvailabilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ConditionDescriptorData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PackageWeightAndSizeData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ProductData;
use Sashalenz\EbayApi\Enums\Condition;
use Sashalenz\EbayApi\Enums\Locale;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Or Replace Inventory Item Request
 *
 * Creates a new inventory item record or replaces an existing inventory item record.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/methods/createOrReplaceInventoryItem
 */
class CreateOrReplaceInventoryItemRequest extends Request
{
    protected string $sku;

    protected ?ProductData $product = null;

    protected ?AvailabilityData $availability = null;

    protected ?Condition $condition = null;

    protected ?string $conditionDescription = null;

    /** @var array<ConditionDescriptorData> */
    protected array $conditionDescriptors = [];

    /** @var array<string> */
    protected array $groupIds = [];

    /** @var array<string> */
    protected array $inventoryItemGroupKeys = [];

    protected ?Locale $locale = null;

    protected ?PackageWeightAndSizeData $packageWeightAndSize = null;

    /**
     * Create a new Create Or Replace Inventory Item request
     *
     * @param  EbayClient|null  $client  The eBay API client (auto-resolved if null)
     * @param  string  $sku  The seller-defined SKU value (max 50 chars)
     */
    public function __construct(?EbayClient $client, string $sku)
    {
        parent::__construct($client);
        $this->sku = $sku;
    }

    /**
     * Set the product information
     */
    public function product(ProductData $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Set the availability information
     */
    public function availability(AvailabilityData $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Set the condition
     */
    public function condition(Condition $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Set the condition description
     */
    public function conditionDescription(string $conditionDescription): self
    {
        $this->conditionDescription = $conditionDescription;

        return $this;
    }

    /**
     * Add a condition descriptor
     */
    public function addConditionDescriptor(ConditionDescriptorData $descriptor): self
    {
        $this->conditionDescriptors[] = $descriptor;

        return $this;
    }

    /**
     * Set condition descriptors
     *
     * @param  array<ConditionDescriptorData>  $descriptors
     */
    public function conditionDescriptors(array $descriptors): self
    {
        $this->conditionDescriptors = $descriptors;

        return $this;
    }

    /**
     * Add a group ID
     */
    public function addGroupId(string $groupId): self
    {
        $this->groupIds[] = $groupId;

        return $this;
    }

    /**
     * Set group IDs
     *
     * @param  array<string>  $groupIds
     */
    public function groupIds(array $groupIds): self
    {
        $this->groupIds = $groupIds;

        return $this;
    }

    /**
     * Add an inventory item group key
     */
    public function addInventoryItemGroupKey(string $key): self
    {
        $this->inventoryItemGroupKeys[] = $key;

        return $this;
    }

    /**
     * Set inventory item group keys
     *
     * @param  array<string>  $keys
     */
    public function inventoryItemGroupKeys(array $keys): self
    {
        $this->inventoryItemGroupKeys = $keys;

        return $this;
    }

    /**
     * Set the locale
     */
    public function locale(Locale $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Set package weight and size
     */
    public function packageWeightAndSize(PackageWeightAndSizeData $packageWeightAndSize): self
    {
        $this->packageWeightAndSize = $packageWeightAndSize;

        return $this;
    }

    /**
     * Get the API endpoint path
     */
    public function endpoint(): string
    {
        return '/sell/inventory/v1/inventory_item/'.urlencode($this->sku);
    }

    /**
     * Get the HTTP method for this request
     */
    public function method(): string
    {
        return 'PUT';
    }

    /**
     * Validate the request before sending
     *
     * @return array<string>
     */
    protected function validate(): array
    {
        $errors = [];

        if ($this->product === null) {
            $errors[] = 'Product information is required';
        }

        if ($this->condition === null) {
            $errors[] = 'Condition is required';
        }

        if ($this->availability === null) {
            $errors[] = 'Availability information is required';
        }

        return $errors;
    }

    /**
     * Get the request body
     */
    public function body(): array
    {
        $body = [];

        if ($this->product !== null) {
            $body['product'] = $this->product->toArray();
        }

        if ($this->availability !== null) {
            $body['availability'] = $this->availability->toArray();
        }

        if ($this->condition !== null) {
            $body['condition'] = $this->condition->value;
        }

        if ($this->conditionDescription !== null) {
            $body['conditionDescription'] = $this->conditionDescription;
        }

        if (! empty($this->conditionDescriptors)) {
            $body['conditionDescriptors'] = array_map(
                fn (ConditionDescriptorData $d) => $d->toArray(),
                $this->conditionDescriptors
            );
        }

        if (! empty($this->groupIds)) {
            $body['groupIds'] = $this->groupIds;
        }

        if (! empty($this->inventoryItemGroupKeys)) {
            $body['inventoryItemGroupKeys'] = $this->inventoryItemGroupKeys;
        }

        if ($this->locale !== null) {
            $body['locale'] = $this->locale->value;
        }

        if ($this->packageWeightAndSize !== null) {
            $body['packageWeightAndSize'] = $this->packageWeightAndSize->toArray();
        }

        return $body;
    }
}
