<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * eBay Notification Model
 *
 * Stores incoming eBay Platform Notifications (SOAP webhooks).
 *
 * @property int $id
 * @property string $event_name
 * @property string $recipient_user_id
 * @property string $notification_signature
 * @property \Carbon\Carbon $timestamp
 * @property string|null $correlation_id
 * @property array $payload
 * @property \Carbon\Carbon|null $processed_at
 * @property string $processing_status
 * @property string|null $error_message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class EbayNotification extends Model
{
    protected $table = 'ebay_notifications';

    protected $guarded = [];

    protected $casts = [
        'timestamp' => 'datetime',
        'payload' => 'array',
        'processed_at' => 'datetime',
    ];

    /**
     * Scope: Get unprocessed notifications
     */
    public function scopeUnprocessed(Builder $query): Builder
    {
        return $query->whereNull('processed_at')
            ->where('processing_status', 'pending');
    }

    /**
     * Scope: Get failed notifications
     */
    public function scopeFailed(Builder $query): Builder
    {
        return $query->where('processing_status', 'failed');
    }

    /**
     * Scope: Get notifications by event name
     */
    public function scopeByEventName(Builder $query, string $eventName): Builder
    {
        return $query->where('event_name', $eventName);
    }

    /**
     * Scope: Get notifications by recipient
     */
    public function scopeByRecipient(Builder $query, string $recipientUserId): Builder
    {
        return $query->where('recipient_user_id', $recipientUserId);
    }

    /**
     * Mark notification as processing
     */
    public function markAsProcessing(): void
    {
        $this->update([
            'processing_status' => 'processing',
        ]);
    }

    /**
     * Mark notification as completed
     */
    public function markAsCompleted(): void
    {
        $this->update([
            'processing_status' => 'completed',
            'processed_at' => now(),
        ]);
    }

    /**
     * Mark notification as failed
     */
    public function markAsFailed(string $errorMessage): void
    {
        $this->update([
            'processing_status' => 'failed',
            'processed_at' => now(),
            'error_message' => $errorMessage,
        ]);
    }
}
