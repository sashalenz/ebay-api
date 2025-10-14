<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Services;

use Carbon\Carbon;
use Sashalenz\EbayApi\Exceptions\InvalidNotificationSignatureException;
use SimpleXMLElement;

/**
 * Notification Parser Service
 *
 * Parses eBay SOAP notifications and validates signatures.
 */
class NotificationParser
{
    public function __construct(
        protected string $devId,
        protected string $appId,
        protected string $certId
    ) {}

    /**
     * Parse SOAP XML notification
     */
    public function parseSOAP(string $xml): array
    {
        // Remove XML declaration and load with SimpleXML
        $xml = preg_replace('/<\?xml.*?\?>/', '', $xml);

        // Parse SOAP envelope
        $soapEnvelope = new SimpleXMLElement($xml);

        // Register SOAP namespaces
        $soapEnvelope->registerXPathNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
        $soapEnvelope->registerXPathNamespace('ebl', 'urn:ebay:apis:eBLBaseComponents');

        // Extract header
        $header = $soapEnvelope->xpath('//soap:Header')[0] ?? null;
        $notificationSignature = (string) ($header?->RequesterCredentials?->NotificationSignature ?? '');

        // Extract body
        $body = $soapEnvelope->xpath('//soap:Body')[0] ?? null;

        if (! $body) {
            throw new \RuntimeException('Invalid SOAP message: Body not found');
        }

        // Get response element (first child of Body)
        $response = $body->children()[0] ?? null;

        if (! $response) {
            throw new \RuntimeException('Invalid SOAP message: Response not found');
        }

        // Extract common fields
        $eventName = (string) ($response->NotificationEventName ?? '');
        $recipientUserId = (string) ($response->RecipientUserID ?? '');
        $timestamp = (string) ($response->Timestamp ?? '');
        $correlationId = (string) ($response->CorrelationID ?? '');

        // Convert SimpleXMLElement to array
        $payloadData = json_decode(json_encode($response), true);

        return [
            'event_name' => $eventName,
            'recipient_user_id' => $recipientUserId,
            'notification_signature' => $notificationSignature,
            'timestamp' => $timestamp,
            'correlation_id' => $correlationId ?: null,
            'payload' => $payloadData,
        ];
    }

    /**
     * Validate notification signature
     *
     * @throws InvalidNotificationSignatureException
     */
    public function validateSignature(string $signature, string $timestamp): bool
    {
        $expectedSignature = $this->generateSignature($timestamp);

        if ($signature !== $expectedSignature) {
            throw InvalidNotificationSignatureException::signatureMismatch($expectedSignature, $signature);
        }

        return true;
    }

    /**
     * Generate expected signature
     */
    protected function generateSignature(string $timestamp): string
    {
        $data = $timestamp.$this->devId.$this->appId.$this->certId;
        $hash = md5($data);

        return base64_encode($hash);
    }

    /**
     * Validate timestamp is within tolerance window
     *
     * @throws InvalidNotificationSignatureException
     */
    public function validateTimestamp(string $timestamp, int $toleranceMinutes = 10): bool
    {
        $notificationTime = Carbon::parse($timestamp);
        $now = Carbon::now();

        $diffInMinutes = abs($now->diffInMinutes($notificationTime));

        if ($diffInMinutes > $toleranceMinutes) {
            throw InvalidNotificationSignatureException::timestampOutOfRange($timestamp, $toleranceMinutes);
        }

        return true;
    }

    /**
     * Extract event-specific data from payload
     */
    public function extractEventData(string $eventName, array $payload): array
    {
        return match ($eventName) {
            'ItemListed' => $this->extractItemData($payload),
            'ItemSold' => $this->extractItemAndTransactionData($payload),
            'ItemEnded' => $this->extractItemData($payload),
            'OrderCreated' => $this->extractOrderData($payload),
            'FeedbackReceived' => $this->extractFeedbackData($payload),
            'MarketplaceAccountDeletion' => $this->extractAccountDeletionData($payload),
            default => $payload,
        };
    }

    protected function extractItemData(array $payload): array
    {
        return [
            'item_id' => $payload['Item']['ItemID'] ?? null,
            'sku' => $payload['Item']['SKU'] ?? null,
            'title' => $payload['Item']['Title'] ?? null,
            'listing_type' => $payload['Item']['ListingType'] ?? null,
            'quantity' => $payload['Item']['Quantity'] ?? null,
            'price' => $payload['Item']['CurrentPrice']['@value'] ?? null,
            'currency' => $payload['Item']['CurrentPrice']['@currencyID'] ?? null,
        ];
    }

    protected function extractItemAndTransactionData(array $payload): array
    {
        return [
            'item_id' => $payload['Item']['ItemID'] ?? null,
            'transaction_id' => $payload['Transaction']['TransactionID'] ?? null,
            'buyer_user_id' => $payload['Transaction']['Buyer']['UserID'] ?? null,
            'quantity_purchased' => $payload['Transaction']['QuantityPurchased'] ?? null,
            'transaction_price' => $payload['Transaction']['TransactionPrice']['@value'] ?? null,
            'total_price' => $payload['Transaction']['TotalPrice']['@value'] ?? null,
        ];
    }

    protected function extractOrderData(array $payload): array
    {
        return [
            'order_id' => $payload['OrderID'] ?? null,
            'order_status' => $payload['OrderStatus'] ?? null,
            'buyer_user_id' => $payload['BuyerUserID'] ?? null,
            'total' => $payload['Total']['@value'] ?? null,
        ];
    }

    protected function extractFeedbackData(array $payload): array
    {
        return [
            'feedback_score' => $payload['FeedbackScore'] ?? null,
            'comment_type' => $payload['CommentType'] ?? null,
            'comment_text' => $payload['CommentText'] ?? null,
            'item_id' => $payload['ItemID'] ?? null,
        ];
    }

    protected function extractAccountDeletionData(array $payload): array
    {
        return [
            'user_id' => $payload['RecipientUserID'] ?? null,
            'deletion_date' => $payload['DeletionDate'] ?? null,
        ];
    }
}
