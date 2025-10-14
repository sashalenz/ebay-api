<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Cancellation;

use Sashalenz\EbayApi\Data\PostOrder\Cancellation\CancellationSearchResultData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Search Cancellations Request
 *
 * Search for order cancellations based on filter criteria.
 * Supports filtering by date range, state, role, and more.
 */
class SearchCancellationsRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = CancellationSearchResultData::class;

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/cancellation/search';
    }

    /**
     * Set creation date range filter
     * Example: "[2023-01-01T00:00:00.000Z..2023-12-31T23:59:59.999Z]"
     */
    public function creationDateRange(string $range): static
    {
        return $this->withQueryParam('creation_date_range_from', $range);
    }

    /**
     * Set limit (max results per page)
     */
    public function limit(int $limit): static
    {
        return $this->withQueryParam('limit', (string) $limit);
    }

    /**
     * Set offset for pagination
     */
    public function offset(int $offset): static
    {
        return $this->withQueryParam('offset', (string) $offset);
    }

    /**
     * Set role filter (BUYER or SELLER)
     */
    public function role(string $role): static
    {
        return $this->withQueryParam('role', $role);
    }

    /**
     * Set cancel state filter
     * Values: PENDING, REJECTED, APPROVED, COMPLETED, CLOSED
     */
    public function cancelState(string $state): static
    {
        return $this->withQueryParam('cancel_state', $state);
    }
}
