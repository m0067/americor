<?php

declare(strict_types=1);

namespace Americor\Presentation\Cli;

use Americor\Application\Client\UseCase\CheckCreditEligibilityUseCase;
use Americor\Application\Client\UseCase\NotifyClientUseCase;
use Americor\Application\ProductCredit\Dto\MakeCreditDecisionDto;
use Americor\Application\ProductCredit\UseCase\MakeCreditDecisionUseCase;
use Americor\Domain\Client\Service\CreditEligibilityService;
use Americor\Domain\ProductCredit\Service\InterestRateService;
use Americor\Infrastructure\Api\FicoCreditScoreService;
use Americor\Infrastructure\NonPersistence\InMemory\Repository\ProductCreditInMemoryRepository;
use Americor\Infrastructure\Notification\EmailNotificationService;

class MakeCreditDecisionCli implements CliInterface
{
    public function run(string $jsonData): bool
    {
        $productData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "Invalid JSON data.\n";
            return false;
        }

        //TODO it is necessary to have DI container, in Infrastructure layer?
        $makeCreditDecisionUseCase = new MakeCreditDecisionUseCase(
            new CheckCreditEligibilityUseCase(
                new CreditEligibilityService(),
                new FicoCreditScoreService(null),
            ),
            new NotifyClientUseCase(new EmailNotificationService(null)),
            new InterestRateService(),
            new ProductCreditInMemoryRepository()
        );
        $makeCreditDecisionDto = MakeCreditDecisionDto::fromArray($productData);
        $response = $makeCreditDecisionUseCase->execute($makeCreditDecisionDto);

        echo json_encode($response);
        return true;
    }
}
