<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Destination;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Destination Request
 *
 * Changes the status and/or name of a destination endpoint.
 */
class UpdateDestinationRequest extends Request
{
    protected string $destinationId;

    protected ?string $name = null;

    protected ?string $status = null;

    public function __construct(?EbayClient $client, string $destinationId)
    {
        parent::__construct($client);
        $this->destinationId = $destinationId;
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function status(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/destination/{$this->destinationId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        $body = [];

        if ($this->name !== null) {
            $body['name'] = $this->name;
        }

        if ($this->status !== null) {
            $body['status'] = $this->status;
        }

        return $body;
    }
}
