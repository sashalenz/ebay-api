<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Metadata\Country;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Sales Tax Jurisdictions Request
 *
 * Retrieves sales tax jurisdictions for countries that support tax tables.
 */
class GetSalesTaxJurisdictionsRequest extends Request
{
    protected string $countryCode;

    public function __construct(?EbayClient $client, string $countryCode)
    {
        parent::__construct($client);
        $this->countryCode = $countryCode;
    }

    public function endpoint(): string
    {
        return "/sell/metadata/v1/country/{$this->countryCode}/sales_tax_jurisdiction";
    }

    public function method(): string
    {
        return 'GET';
    }

    public function dtoKey(): ?string
    {
        return 'salesTaxJurisdictions';
    }
}
