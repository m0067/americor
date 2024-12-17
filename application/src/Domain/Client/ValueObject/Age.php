<?php

declare(strict_types=1);

namespace Americor\Domain\Client\ValueObject;

use Americor\Domain\Common\ValueObject\AbstractValueObject;
use InvalidArgumentException;

final readonly class Age extends AbstractValueObject
{
    private const AGE_MIN = 14;

    public function __construct(public int $value)
    {
        if ($value < self::AGE_MIN) {
            throw new InvalidArgumentException('Age must be 14 years or older.');
        }
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }
}
