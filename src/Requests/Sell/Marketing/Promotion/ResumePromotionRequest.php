<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\Promotion;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Resume Promotion Request
 *
 * Resumes a paused promotion.
 */
class ResumePromotionRequest extends Request
{
    protected string $promotionId;

    public function __construct(?EbayClient $client, string $promotionId)
    {
        parent::__construct($client);
        $this->promotionId = $promotionId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/promotion/{$this->promotionId}/resume";
    }

    public function method(): string
    {
        return 'POST';
    }
}
