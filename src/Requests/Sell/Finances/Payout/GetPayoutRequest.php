<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Finances\Payout;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Finances\PayoutData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payout Request
 *
 * Retrieves the details of a specific seller payout.
 */
class GetPayoutRequest extends Request
{
    protected string $payoutId;

    public function __construct(?EbayClient $client, string $payoutId)
    {
        parent::__construct($client);
        $this->payoutId = $payoutId;
    }

    public function endpoint(): string
    {
        return "/sell/finances/v1/payout/{$this->payoutId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return PayoutData::class;
    }
}
