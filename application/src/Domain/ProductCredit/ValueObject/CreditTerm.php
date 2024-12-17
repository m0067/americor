<?php

declare(strict_types=1);

namespace Americor\Domain\ProductCredit\ValueObject;

use Americor\Domain\Common\ValueObject\AbstractValueObject;
use InvalidArgumentException;

final readonly class CreditTerm extends AbstractValueObject
{
    private const CREDIT_TERM_MIN = 12;

    public function __construct(public int $months)
    {
        if ($months < self::CREDIT_TERM_MIN) {
            throw new InvalidArgumentException('Credit term must be more than ' . self::CREDIT_TERM_MIN . ' months.');
        }
    }

    public function __toString(): string
    {
        return (string)$this->months;
    }
}
