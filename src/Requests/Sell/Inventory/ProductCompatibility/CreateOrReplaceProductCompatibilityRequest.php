<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\ProductCompatibility;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\CompatibilityData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Or Replace Product Compatibility Request
 *
 * Creates or replaces compatibility information for an inventory item.
 *
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/product_compatibility/methods/createOrReplaceProductCompatibility
 */
class CreateOrReplaceProductCompatibilityRequest extends Request
{
    protected string $sku;

    /** @var array<CompatibilityData> */
    protected array $compatibility = [];

    public function __construct(?EbayClient $client, string $sku)
    {
        parent::__construct($client);
        $this->sku = $sku;
    }

    /**
     * Add a compatibility entry
     */
    public function addCompatibility(CompatibilityData $compatibility): self
    {
        $this->compatibility[] = $compatibility;

        return $this;
    }

    /**
     * Set compatibility entries
     *
     * @param  array<CompatibilityData>  $compatibility
     */
    public function compatibility(array $compatibility): self
    {
        $this->compatibility = $compatibility;

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

        if (empty($this->compatibility)) {
            $errors[] = 'At least one compatibility entry is required';
        }

        return $errors;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/inventory_item/'.urlencode($this->sku).'/product_compatibility';
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return [
            'compatibility' => array_map(
                fn (CompatibilityData $c) => $c->toArray(),
                $this->compatibility
            ),
        ];
    }
}
