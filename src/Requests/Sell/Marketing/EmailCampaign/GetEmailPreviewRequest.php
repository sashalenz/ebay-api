<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\EmailCampaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetEmailPreviewRequest extends Request
{
    protected string $emailCampaignId;

    public function __construct(?EbayClient $client, string $emailCampaignId)
    {
        parent::__construct($client);
        $this->emailCampaignId = $emailCampaignId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/email_campaign/{$this->emailCampaignId}/email_preview";
    }

    public function method(): string
    {
        return 'GET';
    }
}
