<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItemGroup;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\VariesByData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Or Replace Inventory Item Group Request
 *
 * Creates or replaces an inventory item group.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item_group/methods/createOrReplaceInventoryItemGroup
 */
class CreateOrReplaceInventoryItemGroupRequest extends Request
{
    protected string $inventoryItemGroupKey;

    /** @var array<string, array<string>> */
    protected array $aspects = [];

    protected ?string $description = null;

    /** @var array<string> */
    protected array $imageUrls = [];

    protected ?string $subtitle = null;

    protected ?string $title = null;

    protected ?VariesByData $variesBy = null;

    /** @var array<string> */
    protected array $variantSKUs = [];

    /** @var array<string> */
    protected array $videoIds = [];

    public function __construct(?EbayClient $client, string $inventoryItemGroupKey)
    {
        parent::__construct($client);
        $this->inventoryItemGroupKey = $inventoryItemGroupKey;
    }

    public function addAspect(string $name, array $values): self
    {
        $this->aspects[$name] = $values;

        return $this;
    }

    public function aspects(array $aspects): self
    {
        $this->aspects = $aspects;

        return $this;
    }

    public function description(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function addImageUrl(string $imageUrl): self
    {
        $this->imageUrls[] = $imageUrl;

        return $this;
    }

    public function imageUrls(array $imageUrls): self
    {
        $this->imageUrls = $imageUrls;

        return $this;
    }

    public function subtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function variesBy(VariesByData $variesBy): self
    {
        $this->variesBy = $variesBy;

        return $this;
    }

    public function addVariantSKU(string $sku): self
    {
        $this->variantSKUs[] = $sku;

        return $this;
    }

    public function variantSKUs(array $skus): self
    {
        $this->variantSKUs = $skus;

        return $this;
    }

    public function addVideoId(string $videoId): self
    {
        $this->videoIds[] = $videoId;

        return $this;
    }

    public function videoIds(array $videoIds): self
    {
        $this->videoIds = $videoIds;

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

        if ($this->title === null) {
            $errors[] = 'Title is required';
        }

        if (empty($this->variantSKUs)) {
            $errors[] = 'At least one variant SKU is required';
        }

        if ($this->variesBy === null) {
            $errors[] = 'VariesBy data is required';
        }

        return $errors;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/inventory_item_group/'.urlencode($this->inventoryItemGroupKey);
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        $body = [];

        if (! empty($this->aspects)) {
            $body['aspects'] = $this->aspects;
        }

        if ($this->description !== null) {
            $body['description'] = $this->description;
        }

        if (! empty($this->imageUrls)) {
            $body['imageUrls'] = $this->imageUrls;
        }

        if ($this->subtitle !== null) {
            $body['subtitle'] = $this->subtitle;
        }

        if ($this->title !== null) {
            $body['title'] = $this->title;
        }

        if ($this->variesBy !== null) {
            $body['variesBy'] = $this->variesBy->toArray();
        }

        if (! empty($this->variantSKUs)) {
            $body['variantSKUs'] = $this->variantSKUs;
        }

        if (! empty($this->videoIds)) {
            $body['videoIds'] = $this->videoIds;
        }

        return $body;
    }
}
