<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\Privilege;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Privileges Request
 *
 * Retrieves the seller's current set of privileges.
 */
class GetPrivilegesRequest extends Request
{
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/privilege';
    }

    public function method(): string
    {
        return 'GET';
    }
}
