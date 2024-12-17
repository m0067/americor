<?php

declare(strict_types=1);

namespace Americor\Application\ProductCredit\UseCase;

use Americor\Application\Client\Dto\CheckCreditEligibilityDto;
use Americor\Application\Client\Dto\NotificationDto;
use Americor\Application\Client\UseCase\CheckCreditEligibilityUseCase;
use Americor\Application\Client\UseCase\NotifyClientUseCase;
use Americor\Application\ProductCredit\Dto\CreditDecisionResponseDto;
use Americor\Application\ProductCredit\Dto\MakeCreditDecisionDto;
use Americor\Common\Enum\CreditStatusEnum;
use Americor\Domain\Common\ValueObject\AddressState;
use Americor\Domain\ProductCredit\Repository\ProductCreditRepositoryInterface;
use Americor\Domain\ProductCredit\Service\InterestRateService;

class MakeCreditDecisionUseCase
{
    public function __construct(
        private CheckCreditEligibilityUseCase $checkCreditEligibilityUseCase,
        private NotifyClientUseCase $notifyClientUseCase,
        private InterestRateService $interestRateService,
        private ProductCreditRepositoryInterface $productCreditRepository,
    ) {
    }

    public function execute(MakeCreditDecisionDto $dto): CreditDecisionResponseDto
    {
        //TODO should be some mapper here
        $creditEligibility = new CheckCreditEligibilityDto(
            $dto->ssn,
            $dto->monthlyIncome,
            $dto->age,
            $dto->state,
        );
        $eligibilityResult = $this->checkCreditEligibilityUseCase->execute($creditEligibility);
        $isApproved = $eligibilityResult->creditStatus === CreditStatusEnum::APPROVED;
        $productCredits = $this->productCreditRepository->all();
        $productCredit = $productCredits[0];
        $interestRate = $this->interestRateService->rate(
            $productCredit->interestRate,
            new AddressState($dto->state),
        );
        $decisionMessage = $isApproved
            ? 'Your credit has been approved. Interest rate: ' . $interestRate->value . '%.'
            : 'Unfortunately, your credit was not approved. Reason: ' . $eligibilityResult->message;
        $notificationDto = new NotificationDto($dto->clientEmail, 'Credit decision', $decisionMessage);
        $this->notifyClientUseCase->execute($notificationDto);

        return new CreditDecisionResponseDto(
            $isApproved,
            $decisionMessage,
            $interestRate->value,
            $productCredit->name->value,
            $productCredit->term->months,
            $productCredit->amount->amount,
        );
    }
}
