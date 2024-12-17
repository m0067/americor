<?php

declare(strict_types=1);

namespace Americor\Domain\ProductCredit\Entity;

use Americor\Domain\Common\Entity\BaseEntity;
use Americor\Domain\Common\ValueObject\Money;
use Americor\Domain\Common\ValueObject\Name;
use Americor\Domain\Common\ValueObject\Ssn;
use Americor\Domain\ProductCredit\ValueObject\CreditTerm;
use Americor\Domain\ProductCredit\ValueObject\InterestRate;

class ProductCredit extends BaseEntity
{
    public function __construct(
        public Ssn $ssn,
        public Name $name,
        public CreditTerm $term,
        public InterestRate $interestRate,
        public Money $amount
    ) {
    }
}
