<?php

declare(strict_types=1);

namespace Americor\Domain\Common\ValueObject;

use InvalidArgumentException;

final readonly class Name extends AbstractValueObject
{
    public function __construct(public string $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Name cannot be empty.');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
