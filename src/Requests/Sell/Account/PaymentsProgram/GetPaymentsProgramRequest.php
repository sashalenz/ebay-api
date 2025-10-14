<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\PaymentsProgram;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payments Program Request
 *
 * Retrieves a seller's onboarding status for a payments program.
 */
class GetPaymentsProgramRequest extends Request
{
    protected MarketplaceId $marketplaceId;

    protected string $paymentsProgramType;

    public function __construct(?EbayClient $client, MarketplaceId $marketplaceId, string $paymentsProgramType)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
        $this->paymentsProgramType = $paymentsProgramType;
    }

    public function endpoint(): string
    {
        return "/sell/account/v1/payments_program/{$this->marketplaceId->value}/{$this->paymentsProgramType}";
    }

    public function method(): string
    {
        return 'GET';
    }
}
