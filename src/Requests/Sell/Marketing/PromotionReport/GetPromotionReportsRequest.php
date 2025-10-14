<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\PromotionReport;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetPromotionReportsRequest extends Request
{
    protected string $marketplaceId;

    protected ?int $limit = null;

    protected ?int $offset = null;

    protected ?string $promotionStatus = null;

    protected ?string $promotionType = null;

    protected ?string $q = null;

    public function __construct(?EbayClient $client, string $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function promotionStatus(string $promotionStatus): self
    {
        $this->promotionStatus = $promotionStatus;

        return $this;
    }

    public function promotionType(string $promotionType): self
    {
        $this->promotionType = $promotionType;

        return $this;
    }

    public function q(string $q): self
    {
        $this->q = $q;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/promotion_report';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = ['marketplace_id' => $this->marketplaceId];

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        if ($this->promotionStatus !== null) {
            $query['promotion_status'] = $this->promotionStatus;
        }

        if ($this->promotionType !== null) {
            $query['promotion_type'] = $this->promotionType;
        }

        if ($this->q !== null) {
            $query['q'] = $this->q;
        }

        return $query;
    }
}
