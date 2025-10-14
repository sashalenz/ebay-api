<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Finances\Transaction;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Finances\TransactionSummaryData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Transaction Summary Request
 *
 * Retrieves the total counts and values for various monetary transactions.
 */
class GetTransactionSummaryRequest extends Request
{
    protected ?string $filter = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function filter(string $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/finances/v1/transaction_summary';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->filter !== null) {
            $query['filter'] = $this->filter;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return TransactionSummaryData::class;
    }
}
