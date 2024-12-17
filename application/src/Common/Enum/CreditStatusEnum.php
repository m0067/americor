<?php

declare(strict_types=1);

namespace Americor\Common\Enum;

enum CreditStatusEnum: string
{
    case PENDING = 'Pending';
    case APPROVED = 'Approved';
    case REJECTED = 'Rejected';
}
