<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\EmailCampaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\EmailCampaignData;
use Sashalenz\EbayApi\Requests\Request;

class GetEmailCampaignRequest extends Request
{
    protected string $emailCampaignId;

    public function __construct(?EbayClient $client, string $emailCampaignId)
    {
        parent::__construct($client);
        $this->emailCampaignId = $emailCampaignId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/email_campaign/{$this->emailCampaignId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return EmailCampaignData::class;
    }
}
