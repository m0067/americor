<?php

declare(strict_types=1);

namespace Americor\Domain\ProductCredit\Service;

use Americor\Domain\Common\Enum\AddressStateEnum;
use Americor\Domain\Common\ValueObject\AddressState;
use Americor\Domain\ProductCredit\ValueObject\InterestRate;

class InterestRateService
{
    private const RATE_CA_PERCENTAGE = 11.49;
    private const SCALE_AFTER_DECIMAL_POINT_DETAILED = 14;

    public function rate(InterestRate $interestRate, AddressState $addressState): InterestRate
    {
        if ($addressState->value === AddressStateEnum::CA->value) {
            $percent = (string)(self::RATE_CA_PERCENTAGE / 100);
            $value = bcmul((string)$interestRate->value, $percent, self::SCALE_AFTER_DECIMAL_POINT_DETAILED);

            return new InterestRate(round((float)$value, 2));
        }

        return $interestRate;
    }
}
