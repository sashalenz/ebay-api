<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Notification Event Type
 *
 * eBay Platform Notification event types.
 */
enum NotificationEventType: string
{
    // Item Related
    case ITEM_LISTED = 'ItemListed';
    case ITEM_SOLD = 'ItemSold';
    case ITEM_ENDED = 'ItemEnded';
    case ITEM_REVISED = 'ItemRevised';
    case ITEM_SUSPENDED = 'ItemSuspended';
    case ITEM_CLOSED = 'ItemClosed';
    case ITEM_EXTENDED = 'ItemExtended';
    case ITEM_AVAILABILITY = 'ItemAvailability';
    case ITEM_PRICE_REVISION = 'ItemPriceRevision';

    // Auction Related
    case AUCTION_CHECKOUT_COMPLETE = 'AuctionCheckoutComplete';
    case END_OF_AUCTION = 'EndOfAuction';
    case BID_PLACED = 'BidPlaced';
    case BID_RECEIVED = 'BidReceived';
    case OUTBID = 'Outbid';

    // Order Related
    case ORDER_CREATED = 'OrderCreated';
    case ORDER_CANCELLED = 'OrderCancelled';
    case ORDER_SHIPPED = 'OrderShipped';

    // Feedback Related
    case FEEDBACK_RECEIVED = 'FeedbackReceived';
    case FEEDBACK_LEFT = 'FeedbackLeft';
    case FEEDBACK_STAR_CHANGED = 'FeedbackStarChanged';

    // Buyer Protection
    case DISPUTE_OPENED = 'DisputeOpened';
    case DISPUTE_CLOSED = 'DisputeClosed';
    case RETURN_OPENED = 'ReturnOpened';
    case RETURN_CLOSED = 'ReturnClosed';

    // Account Related
    case MARKETPLACE_ACCOUNT_DELETION = 'MarketplaceAccountDeletion';
    case USER_ID_CHANGED = 'UserIdChanged';

    // Quote Related
    case BUYER_REQUESTED_PURCHASE_QUOTE = 'BuyerRequestedPurchaseQuote';

    // Promoted Listings
    case PLA_CAMPAIGN_BUDGET_STATUS = 'PLACampaignBudgetStatus';
    case PRIORITY_LISTING_REVISION = 'PriorityListingRevision';

    // Listing Preview
    case LISTING_PREVIEW_CREATION_TASK_STATUS = 'ListingPreviewCreationTaskStatus';

    // Seller Metrics
    case SELLER_CUSTOMER_SERVICE_METRIC_RATING = 'SellerCustomerServiceMetricRating';
    case SELLER_STANDARDS_PROFILE_METRICS = 'SellerStandardsProfileMetrics';

    // Authorization
    case AUTHORIZATION_REVOCATION = 'AuthorizationRevocation';

    // Informational
    case WATCH_COUNT_EXCEEDED = 'WatchCountExceeded';
    case BEST_OFFER = 'BestOffer';
    case COUNTER_OFFER_RECEIVED = 'CounterOfferReceived';

    /**
     * Check if this event requires immediate processing
     */
    public function requiresImmediateProcessing(): bool
    {
        return match ($this) {
            self::MARKETPLACE_ACCOUNT_DELETION,
            self::AUTHORIZATION_REVOCATION,
            self::USER_ID_CHANGED => true,
            default => false,
        };
    }

    /**
     * Get the Event class for this notification type
     */
    public function getEventClass(): ?string
    {
        return match ($this) {
            self::ITEM_LISTED => \Sashalenz\EbayApi\Events\Notifications\ItemListedEvent::class,
            self::ITEM_SOLD => \Sashalenz\EbayApi\Events\Notifications\ItemSoldEvent::class,
            self::ITEM_ENDED => \Sashalenz\EbayApi\Events\Notifications\ItemEndedEvent::class,
            self::ITEM_REVISED => \Sashalenz\EbayApi\Events\Notifications\ItemRevisedEvent::class,
            self::FEEDBACK_RECEIVED => \Sashalenz\EbayApi\Events\Notifications\FeedbackReceivedEvent::class,
            self::ORDER_CREATED => \Sashalenz\EbayApi\Events\Notifications\OrderCreatedEvent::class,
            self::ORDER_CANCELLED => \Sashalenz\EbayApi\Events\Notifications\OrderCancelledEvent::class,
            self::MARKETPLACE_ACCOUNT_DELETION => \Sashalenz\EbayApi\Events\Notifications\MarketplaceAccountDeletionEvent::class,
            self::BUYER_REQUESTED_PURCHASE_QUOTE => \Sashalenz\EbayApi\Events\Notifications\BuyerRequestedPurchaseQuoteEvent::class,
            self::ITEM_AVAILABILITY => \Sashalenz\EbayApi\Events\Notifications\ItemAvailabilityEvent::class,
            default => null,
        };
    }
}
