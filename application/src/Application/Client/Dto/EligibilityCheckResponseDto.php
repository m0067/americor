<?php

declare(strict_types=1);

namespace Americor\Application\Client\Dto;

use Americor\Application\Common\Dto\BaseDto;
use Americor\Common\Enum\CreditStatusEnum;

class EligibilityCheckResponseDto extends BaseDto
{
    public function __construct(public CreditStatusEnum $creditStatus, public string $message)
    {
    }
}
