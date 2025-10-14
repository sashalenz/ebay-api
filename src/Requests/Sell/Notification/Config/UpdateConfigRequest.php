<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Config;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Config Request
 *
 * Updates the alert email address associated with the user.
 */
class UpdateConfigRequest extends Request
{
    protected string $alertEmail;

    public function __construct(?EbayClient $client, string $alertEmail)
    {
        parent::__construct($client);
        $this->alertEmail = $alertEmail;
    }

    public function endpoint(): string
    {
        return '/sell/notification/v1/config';
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        return [
            'alertEmail' => $this->alertEmail,
        ];
    }
}
