<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Destination;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Destination Request
 *
 * Deletes a disabled destination endpoint.
 */
class DeleteDestinationRequest extends Request
{
    protected string $destinationId;

    public function __construct(?EbayClient $client, string $destinationId)
    {
        parent::__construct($client);
        $this->destinationId = $destinationId;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/destination/{$this->destinationId}";
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
