<?php

declare(strict_types=1);

namespace Americor\Infrastructure\Persistence\MariaDb\Repository;

use Americor\Domain\ProductCredit\Entity\ProductCredit;
use Americor\Domain\ProductCredit\Repository\ProductCreditRepositoryInterface;

class ProductCreditRepository implements ProductCreditRepositoryInterface
{
    /**
     * TODO $db should have an interface like DbInterface with a send method. Here for informational purposes only
     * @param DbInterface $db
     */
    public function __construct(private $db)
    {
    }

    /**
     * TODO
     * @return array|ProductCredit[]
     */
    public function all(): array
    {
        return [];
    }
}
