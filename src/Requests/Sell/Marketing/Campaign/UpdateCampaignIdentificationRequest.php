<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Campaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Campaign Identification Request
 *
 * Updates campaign name, start/end dates.
 */
class UpdateCampaignIdentificationRequest extends Request
{
    protected string $campaignId;

    protected array $identificationData;

    public function __construct(?EbayClient $client, string $campaignId, array $identificationData)
    {
        parent::__construct($client);
        $this->campaignId = $campaignId;
        $this->identificationData = $identificationData;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_campaign/{$this->campaignId}/update_campaign_identification";
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->identificationData;
    }
}
