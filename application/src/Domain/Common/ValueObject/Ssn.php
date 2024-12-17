<?php

declare(strict_types=1);

namespace Americor\Domain\Common\ValueObject;

use InvalidArgumentException;

final readonly class Ssn extends AbstractValueObject
{
    public function __construct(public string $ssn)
    {
        if (!preg_match('/^\d{3}-\d{2}-\d{4}$/', $ssn)) {
            throw new InvalidArgumentException('Invalid SSN format.');
        }
    }

    public function __toString(): string
    {
        return $this->ssn;
    }
}
