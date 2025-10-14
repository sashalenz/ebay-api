<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\EmailCampaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetAudiencesRequest extends Request
{
    protected string $emailCampaignType;

    public function __construct(?EbayClient $client, string $emailCampaignType)
    {
        parent::__construct($client);
        $this->emailCampaignType = $emailCampaignType;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/email_campaign/audience';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return ['email_campaign_type' => $this->emailCampaignType];
    }
}
