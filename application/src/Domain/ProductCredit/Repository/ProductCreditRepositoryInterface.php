<?php

declare(strict_types=1);

namespace Americor\Domain\ProductCredit\Repository;

use Americor\Domain\ProductCredit\Entity\ProductCredit;

interface ProductCreditRepositoryInterface
{
    /**
     * @return ProductCredit[]
     */
    public function all(): array;
}
