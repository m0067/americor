<?php

declare(strict_types=1);

namespace Americor\Domain\Client\Service;

use Americor\Common\Enum\CreditStatusEnum;
use Americor\Domain\Client\ValueObject\Age;
use Americor\Domain\Client\ValueObject\FicoCreditScore;
use Americor\Domain\Common\Enum\AddressStateEnum;
use Americor\Domain\Common\ValueObject\AddressState;
use Americor\Domain\Common\ValueObject\Money;
use Americor\Domain\ProductCredit\ValueObject\EligibilityCheckResult;

class CreditEligibilityService
{
    private const FICO_CREDIT_SCORE_MAX_ALLOWED = 500;
    private const MONTHLY_INCOME_MIN_ALLOWED = 1000;
    private const AGE_MIN_ALLOWED = 18;
    private const AGE_MAX_ALLOWED = 60;

    public function checkEligibility(
        FicoCreditScore $ficoCreditScore,
        Money $monthlyIncome,
        Age $age,
        AddressState $state
    ): EligibilityCheckResult {
        if ($ficoCreditScore->value > self::FICO_CREDIT_SCORE_MAX_ALLOWED) {
            return new EligibilityCheckResult(CreditStatusEnum::REJECTED, 'The credit rating is too high.');
        }

        if ($monthlyIncome->amount < self::MONTHLY_INCOME_MIN_ALLOWED) {
            return new EligibilityCheckResult(CreditStatusEnum::REJECTED, 'The monthly income is too low.');
        }

        if ($age->value < self::AGE_MIN_ALLOWED || $age->value > self::AGE_MAX_ALLOWED) {
            return new EligibilityCheckResult(CreditStatusEnum::REJECTED, 'The client\'s age does not meet the requirements.');
        }

        if (!in_array($state->value, AddressStateEnum::LIST_ALLOWED(), true)) {
            return new EligibilityCheckResult(CreditStatusEnum::REJECTED, 'Credits are not available in your state.');
        }

        if ($state->value === AddressStateEnum::RANDOM_ALLOWED() && random_int(0, 1) === 0) {
            return new EligibilityCheckResult(CreditStatusEnum::REJECTED, 'The credit was not approved by chance.');
        }

        return new EligibilityCheckResult(CreditStatusEnum::APPROVED, 'The credit has been approved.');
    }
}
