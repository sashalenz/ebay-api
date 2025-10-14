<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\PublicKey;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\PublicKeyData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Public Key Request
 *
 * Retrieves a key that is needed to validate an eBay push notification message payload.
 */
class GetPublicKeyRequest extends Request
{
    protected string $publicKeyId;

    public function __construct(?EbayClient $client, string $publicKeyId)
    {
        parent::__construct($client);
        $this->publicKeyId = $publicKeyId;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/public_key/{$this->publicKeyId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return PublicKeyData::class;
    }
}
