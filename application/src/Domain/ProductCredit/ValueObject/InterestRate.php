<?php

declare(strict_types=1);

namespace Americor\Domain\ProductCredit\ValueObject;

use Americor\Domain\Common\ValueObject\AbstractValueObject;
use InvalidArgumentException;

final readonly class InterestRate extends AbstractValueObject
{
    private const INTEREST_RATE_MIN = 0;

    public function __construct(public float $value)
    {
        if ($value < self::INTEREST_RATE_MIN) {
            throw new InvalidArgumentException('Interest rate cannot be less than ' . self::INTEREST_RATE_MIN);
        }
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }
}
