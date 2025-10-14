<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Finances\Transfer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Finances\TransferData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Transfer Request
 *
 * Retrieves detailed information on a monetary transaction where the seller is reimbursing eBay.
 */
class GetTransferRequest extends Request
{
    protected string $transferId;

    public function __construct(?EbayClient $client, string $transferId)
    {
        parent::__construct($client);
        $this->transferId = $transferId;
    }

    public function endpoint(): string
    {
        return "/sell/finances/v1/transfer/{$this->transferId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return TransferData::class;
    }
}
