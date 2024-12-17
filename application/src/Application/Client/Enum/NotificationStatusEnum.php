<?php

declare(strict_types=1);

namespace Americor\Application\Client\Enum;

enum NotificationStatusEnum: string
{
    case APPROVED = 'Approved';
    case REJECTED = 'Rejected';
}
