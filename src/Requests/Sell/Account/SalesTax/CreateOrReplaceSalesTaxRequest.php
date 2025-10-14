<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\SalesTax;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Or Replace Sales Tax Request
 *
 * Creates or updates a sales tax table entry for the specified country and jurisdiction.
 */
class CreateOrReplaceSalesTaxRequest extends Request
{
    protected string $countryCode;

    protected string $jurisdictionId;

    protected string $salesTaxPercentage;

    protected ?bool $shippingAndHandlingTaxed = null;

    public function __construct(?EbayClient $client, string $countryCode, string $jurisdictionId, string $salesTaxPercentage)
    {
        parent::__construct($client);
        $this->countryCode = $countryCode;
        $this->jurisdictionId = $jurisdictionId;
        $this->salesTaxPercentage = $salesTaxPercentage;
    }

    public function shippingAndHandlingTaxed(bool $shippingAndHandlingTaxed): self
    {
        $this->shippingAndHandlingTaxed = $shippingAndHandlingTaxed;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/sales_tax/{$this->countryCode}/{$this->jurisdictionId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        $body = [
            'salesTaxPercentage' => $this->salesTaxPercentage,
        ];

        if ($this->shippingAndHandlingTaxed !== null) {
            $body['shippingAndHandlingTaxed'] = $this->shippingAndHandlingTaxed;
        }

        return $body;
    }
}
