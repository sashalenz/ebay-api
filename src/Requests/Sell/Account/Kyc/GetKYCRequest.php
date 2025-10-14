<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\Kyc;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get KYC Request
 *
 * @deprecated This method has been deprecated.
 *
 * Managed payments seller discovers any 'Know Your Customer' (KYC) check action items.
 */
class GetKYCRequest extends Request
{
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/kyc';
    }

    public function method(): string
    {
        return 'GET';
    }
}
