<?php

declare(strict_types=1);

namespace Americor\Domain\Client\ValueObject;

use Americor\Domain\Common\ValueObject\AbstractValueObject;
use InvalidArgumentException;

final readonly class PhoneNumber extends AbstractValueObject
{
    public function __construct(public string $value)
    {
        if (!preg_match('/^\+\d{10,15}$/', $value)) {
            throw new InvalidArgumentException('Invalid phone number format.');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
