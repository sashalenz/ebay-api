<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Data\PostOrder\CaseManagement\CaseData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Case Request
 *
 * Retrieve the details related to a specific case.
 */
class GetCaseRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = CaseData::class;

    public function __construct(
        protected string $caseId,
    ) {}

    public static function make(string $caseId): static
    {
        return new static($caseId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/casemanagement/{$this->caseId}";
    }

    /**
     * Set field groups to include
     * Values: FULL, COMPACT
     */
    public function fieldGroups(string $fieldGroups): static
    {
        return $this->withQueryParam('fieldgroups', $fieldGroups);
    }
}
