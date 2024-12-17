<?php

declare(strict_types=1);

namespace Americor\Infrastructure\Api;

use Americor\Application\Client\Service\FicoCreditScoreServiceInterface;

class FicoCreditScoreService implements FicoCreditScoreServiceInterface
{
    /**
     * TODO $api should have an class/interface like FicoCreditScoreApi with a send method. Here for informational purposes only
     * @param FicoCreditScoreApi $api
     */
    public function __construct(private $api)
    {
    }

    public function getCreditScore(string $ssn): int
    {
        //TODO
        return 500;
//        return $this->api->getCreditScore($ssn);
    }
}
