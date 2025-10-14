<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\V2\RateTable;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Shipping Cost Request (v2)
 *
 * Updates one or more shipping rates for a specific shipping rate table.
 */
class UpdateShippingCostRequest extends Request
{
    protected string $rateTableId;

    protected array $shippingCosts = [];

    public function __construct(?EbayClient $client, string $rateTableId)
    {
        parent::__construct($client);
        $this->rateTableId = $rateTableId;
    }

    public function shippingCosts(array $shippingCosts): self
    {
        $this->shippingCosts = $shippingCosts;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/account/v2/rate_table/{$this->rateTableId}/update_shipping_cost";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'shippingCosts' => $this->shippingCosts,
        ];
    }
}
