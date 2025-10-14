<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Data\PostOrder\CaseManagement\CaseSearchResultData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Search Cases Request
 *
 * Search for cases (disputes) based on filter criteria.
 */
class SearchCasesRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = CaseSearchResultData::class;

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/casemanagement/search';
    }

    /**
     * Set case creation date range filter
     */
    public function caseCreationDateRange(string $range): static
    {
        return $this->withQueryParam('case_creation_date_range_from', $range);
    }

    /**
     * Set case status filter
     */
    public function caseStatusFilter(string $status): static
    {
        return $this->withQueryParam('case_status_filter', $status);
    }

    /**
     * Set field groups (FULL or COMPACT)
     */
    public function fieldGroups(string $fieldGroups): static
    {
        return $this->withQueryParam('fieldgroups', $fieldGroups);
    }

    /**
     * Set item ID filter
     */
    public function itemId(string $itemId): static
    {
        return $this->withQueryParam('item_id', $itemId);
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
     * Set order ID filter
     */
    public function orderId(string $orderId): static
    {
        return $this->withQueryParam('order_id', $orderId);
    }

    /**
     * Set role filter (BUYER or SELLER)
     */
    public function role(string $role): static
    {
        return $this->withQueryParam('role', $role);
    }

    /**
     * Set sort order
     */
    public function sort(string $sort): static
    {
        return $this->withQueryParam('sort', $sort);
    }

    /**
     * Set transaction ID filter
     */
    public function transactionId(string $transactionId): static
    {
        return $this->withQueryParam('transaction_id', $transactionId);
    }
}
