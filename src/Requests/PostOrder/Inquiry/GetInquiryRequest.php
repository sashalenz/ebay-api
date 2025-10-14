<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Inquiry;

use Sashalenz\EbayApi\Data\PostOrder\Inquiry\InquiryData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Inquiry Request
 *
 * Retrieve the details of an inquiry.
 */
class GetInquiryRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = InquiryData::class;

    public function __construct(
        protected string $inquiryId,
    ) {}

    public static function make(string $inquiryId): static
    {
        return new static($inquiryId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/inquiry/{$this->inquiryId}";
    }

    public function fieldGroups(string $fieldGroups): static
    {
        return $this->withQueryParam('fieldgroups', $fieldGroups);
    }
}
