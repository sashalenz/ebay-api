<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdGroup;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\AdGroupData;
use Sashalenz\EbayApi\Requests\Request;

class CreateAdGroupRequest extends Request
{
    protected string $campaignId;

    protected array $adGroupData;

    public function __construct(?EbayClient $client, string $campaignId, array $adGroupData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->adGroupData = $adGroupData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/ad_group";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->adGroupData;
    }

    protected function dto(): ?string
    {
        return AdGroupData::class;
    }
}
