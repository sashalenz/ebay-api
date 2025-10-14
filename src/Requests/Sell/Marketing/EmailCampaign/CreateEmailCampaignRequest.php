<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\EmailCampaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\EmailCampaignData;
use Sashalenz\EbayApi\Requests\Request;

class CreateEmailCampaignRequest extends Request
{
    protected array $emailCampaignData;

    public function __construct(?EbayClient $client, array $emailCampaignData)
    {
        parent::__construct($client);
        $this->emailCampaignData = $emailCampaignData;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/email_campaign';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->emailCampaignData;
    }

    protected function dto(): ?string
    {
        return EmailCampaignData::class;
    }
}
