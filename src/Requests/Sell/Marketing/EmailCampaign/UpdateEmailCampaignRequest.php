<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\EmailCampaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class UpdateEmailCampaignRequest extends Request
{
    protected string $emailCampaignId;

    protected array $emailCampaignData;

    public function __construct(?EbayClient $client, string $emailCampaignId, array $emailCampaignData)
    {
        parent::__construct($client);
        $this->emailCampaignId = $emailCampaignId;
        $this->emailCampaignData = $emailCampaignData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/email_campaign/{$this->emailCampaignId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return $this->emailCampaignData;
    }
}
