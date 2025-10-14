<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\V2\PayoutSettings;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Payout Percentage Request (v2)
 *
 * Updates the split-payout percentage for two payout instruments for sellers in mainland China.
 */
class UpdatePayoutPercentageRequest extends Request
{
    protected string $payoutInstrumentId;

    protected string $payoutPercentage;

    public function __construct(?EbayClient $client, string $payoutInstrumentId, string $payoutPercentage)
    {
        parent::__construct($client);
        $this->payoutInstrumentId = $payoutInstrumentId;
        $this->payoutPercentage = $payoutPercentage;
    }

    public function endpoint(): string
    {
        return '/sell/account/v2/payout_settings/update_percentage';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'payoutInstrumentId' => $this->payoutInstrumentId,
            'payoutPercentage' => $this->payoutPercentage,
        ];
    }
}
