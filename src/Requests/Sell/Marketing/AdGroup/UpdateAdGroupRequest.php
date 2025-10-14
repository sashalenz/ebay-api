<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdGroup;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class UpdateAdGroupRequest extends Request
{
    protected string $campaignId;

    protected string $adGroupId;

    protected array $adGroupData;

    public function __construct(?EbayClient $client, string $campaignId, string $adGroupId, array $adGroupData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupId = $adGroupId;
        $this->adGroupData = $adGroupData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group/{$this->adGroupId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return $this->adGroupData;
    }
}
