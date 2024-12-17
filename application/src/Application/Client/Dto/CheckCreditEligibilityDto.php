<?php

declare(strict_types=1);

namespace Americor\Application\Client\Dto;

use Americor\Application\Common\Dto\BaseDto;

class CheckCreditEligibilityDto extends BaseDto
{
    public function __construct(
        public string $ssn,
        public float $monthlyIncome,
        public int $age,
        public string $state
    ) {
    }
}
