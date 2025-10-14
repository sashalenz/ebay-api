<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Charity;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Charity\CharityOrgData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Charity Organization Request
 *
 * Retrieves details for a specific charitable organization.
 */
class GetCharityOrgRequest extends Request
{
    protected string $charityOrgId;

    public function __construct(?EbayClient $client, string $charityOrgId)
    {
        parent::__construct($client);
        $this->charityOrgId = $charityOrgId;
    }

    public function endpoint(): string
    {
        return "/sell/charity/v1/charity_org/{$this->charityOrgId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return CharityOrgData::class;
    }
}
