<?php

declare(strict_types=1);

namespace Americor\Domain\Client\ValueObject;

use Americor\Domain\Common\ValueObject\AbstractValueObject;
use InvalidArgumentException;

final readonly class Email extends AbstractValueObject
{
    public function __construct(public string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address.');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
