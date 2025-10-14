<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\V2\PayoutSettings;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payout Settings Request (v2)
 *
 * Retrieves payout percentages and unique IDs for accounts configured to receive seller payouts.
 * This method is only available for sellers in mainland China.
 */
class GetPayoutSettingsRequest extends Request
{
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function endpoint(): string
    {
        return '/sell/account/v2/payout_settings';
    }

    public function method(): string
    {
        return 'GET';
    }
}
