<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Data\PostOrder\Return\ReturnSearchResultData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Search Returns Request
 *
 * Search for return requests based on filter criteria.
 */
class SearchReturnsRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = ReturnSearchResultData::class;

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/return/search';
    }

    public function creationDateRange(string $range): static
    {
        return $this->withQueryParam('creation_date_range_from', $range);
    }

    public function itemId(string $itemId): static
    {
        return $this->withQueryParam('item_id', $itemId);
    }

    public function limit(int $limit): static
    {
        return $this->withQueryParam('limit', (string) $limit);
    }

    public function offset(int $offset): static
    {
        return $this->withQueryParam('offset', (string) $offset);
    }

    public function orderId(string $orderId): static
    {
        return $this->withQueryParam('order_id', $orderId);
    }

    public function returnState(string $state): static
    {
        return $this->withQueryParam('return_state', $state);
    }

    public function role(string $role): static
    {
        return $this->withQueryParam('role', $role);
    }

    public function sort(string $sort): static
    {
        return $this->withQueryParam('sort', $sort);
    }

    public function transactionId(string $transactionId): static
    {
        return $this->withQueryParam('transaction_id', $transactionId);
    }
}
