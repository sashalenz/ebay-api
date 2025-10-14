<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Config;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\ConfigData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Config Request
 *
 * Retrieves the alert email address associated with the user.
 */
class GetConfigRequest extends Request
{
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function endpoint(): string
    {
        return '/sell/notification/v1/config';
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ConfigData::class;
    }
}
