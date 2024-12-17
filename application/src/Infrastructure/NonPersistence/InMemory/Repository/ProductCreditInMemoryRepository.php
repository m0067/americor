<?php

declare(strict_types=1);

namespace Americor\Infrastructure\NonPersistence\InMemory\Repository;

use Americor\Application\Client\Enum\CurrencyEnum;
use Americor\Domain\Common\ValueObject\Money;
use Americor\Domain\Common\ValueObject\Name;
use Americor\Domain\Common\ValueObject\Ssn;
use Americor\Domain\ProductCredit\Entity\ProductCredit;
use Americor\Domain\ProductCredit\Repository\ProductCreditRepositoryInterface;
use Americor\Domain\ProductCredit\ValueObject\CreditTerm;
use Americor\Domain\ProductCredit\ValueObject\InterestRate;

class ProductCreditInMemoryRepository implements ProductCreditRepositoryInterface
{
    private array $storage = [];

    /**
     * @return array|ProductCredit[]
     */
    public function all(): array
    {
        //TODO should be some mapper here
        return [
            new ProductCredit(
                new Ssn('123-12-1234'),
                new Name('ProductCredit'),
                new CreditTerm(12),
                new InterestRate(12),
                new Money(120000, CurrencyEnum::USD->value),
            )
        ];

//        return $this->storage;
    }
}
