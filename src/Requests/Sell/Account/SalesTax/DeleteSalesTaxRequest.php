<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\SalesTax;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Sales Tax Request
 *
 * Deletes the sales tax table entry for the specified country and jurisdiction.
 */
class DeleteSalesTaxRequest extends Request
{
    protected string $countryCode;

    protected string $jurisdictionId;

    public function __construct(?EbayClient $client, string $countryCode, string $jurisdictionId)
    {
        parent::__construct($client);
        $this->countryCode = $countryCode;
        $this->jurisdictionId = $jurisdictionId;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/sales_tax/{$this->countryCode}/{$this->jurisdictionId}";
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
