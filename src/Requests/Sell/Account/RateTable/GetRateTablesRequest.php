<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\RateTable;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Rate Tables Request
 *
 * Retrieves a list of shipping rate tables that have been defined for a seller's account.
 */
class GetRateTablesRequest extends Request
{
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/rate_table';
    }

    public function method(): string
    {
        return 'GET';
    }
}
