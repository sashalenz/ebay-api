<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * Task Status Enum
 *
 * Status values for Feed API tasks.
 */
enum TaskStatus: string
{
    case QUEUED = 'QUEUED';
    case IN_PROCESS = 'IN_PROCESS';
    case COMPLETED = 'COMPLETED';
    case COMPLETED_WITH_ERROR = 'COMPLETED_WITH_ERROR';
    case FATAL = 'FATAL';
}
