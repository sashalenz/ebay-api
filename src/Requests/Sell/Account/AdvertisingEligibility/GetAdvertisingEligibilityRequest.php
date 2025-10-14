<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\AdvertisingEligibility;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Advertising Eligibility Request
 *
 * Retrieves the seller eligibility status for eBay advertising programs.
 */
class GetAdvertisingEligibilityRequest extends Request
{
    protected ?string $programTypes = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function programTypes(string $programTypes): self
    {
        $this->programTypes = $programTypes;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/advertising_eligibility';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->programTypes !== null) {
            $query['program_types'] = $this->programTypes;
        }

        return $query;
    }
}
