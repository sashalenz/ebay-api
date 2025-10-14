<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\SalesTax;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\SalesTaxesData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Sales Taxes Request
 *
 * Retrieves the sales tax table for the specified country.
 */
class GetSalesTaxesRequest extends Request
{
    protected string $countryCode;

    public function __construct(?EbayClient $client, string $countryCode)
    {
        parent::__construct($client);
        $this->countryCode = $countryCode;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/sales_tax';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return [
            'country_code' => $this->countryCode,
        ];
    }

    protected function dto(): ?string
    {
        return SalesTaxesData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'salesTaxes';
    }
}
