<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\V2\RateTable;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Rate Table Request (v2)
 *
 * Retrieves details of a specific shipping rate table.
 */
class GetRateTableRequest extends Request
{
    protected string $rateTableId;

    public function __construct(?EbayClient $client, string $rateTableId)
    {
        parent::__construct($client);
        $this->rateTableId = $rateTableId;
    }

    public function endpoint(): string
    {
        return "/sell/account/v2/rate_table/{$this->rateTableId}";
    }

    public function method(): string
    {
        return 'GET';
    }
}
