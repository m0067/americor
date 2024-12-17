<?php

declare(strict_types=1);

namespace Americor\Application\Client\UseCase;

use Americor\Application\Client\Dto\CheckCreditEligibilityDto;
use Americor\Application\Client\Dto\EligibilityCheckResponseDto;
use Americor\Application\Client\Enum\CurrencyEnum;
use Americor\Application\Client\Service\FicoCreditScoreServiceInterface;
use Americor\Domain\Client\Service\CreditEligibilityService;
use Americor\Domain\Client\ValueObject\Age;
use Americor\Domain\Client\ValueObject\FicoCreditScore;
use Americor\Domain\Common\ValueObject\AddressState;
use Americor\Domain\Common\ValueObject\Money;

class CheckCreditEligibilityUseCase
{
    public function __construct(
        private CreditEligibilityService $creditEligibilityService,
        private FicoCreditScoreServiceInterface $ficoCreditScoreService
    ) {
    }

    public function execute(CheckCreditEligibilityDto $dto): EligibilityCheckResponseDto
    {
        //TODO should be some mapper here
        $creditScore = $this->ficoCreditScoreService->getCreditScore($dto->ssn);
        $result = $this->creditEligibilityService->checkEligibility(
            new FicoCreditScore($creditScore),
            new Money($dto->monthlyIncome, CurrencyEnum::USD->value),
            new Age($dto->age),
            new AddressState($dto->state),
        );

        return new EligibilityCheckResponseDto(
            $result->creditStatus,
            $result->message
        );
    }
}
