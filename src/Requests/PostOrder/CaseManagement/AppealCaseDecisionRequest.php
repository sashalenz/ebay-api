<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\CaseManagement;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Appeal Case Decision Request
 *
 * Buyer or seller appeals a case decision made by eBay.
 */
class AppealCaseDecisionRequest extends Request
{
    protected string $method = 'POST';

    protected array $payload = [];

    public function __construct(
        protected string $caseId,
    ) {}

    public static function make(string $caseId): static
    {
        return new static($caseId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/casemanagement/{$this->caseId}/appeal";
    }

    /**
     * Set appeal reason (required)
     */
    public function appealReason(string $reason): static
    {
        $this->payload['appealReason'] = $reason;

        return $this;
    }

    /**
     * Set comments explaining the appeal
     */
    public function comments(string $comments): static
    {
        $this->payload['comments'] = $comments;

        return $this;
    }

    public function defaultBody(): array
    {
        return $this->payload;
    }
}
