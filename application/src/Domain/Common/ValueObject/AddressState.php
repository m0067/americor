<?php

declare(strict_types=1);

namespace Americor\Domain\Common\ValueObject;

use InvalidArgumentException;

final readonly class AddressState extends AbstractValueObject
{
    private const STATE_CODE_LENGTH = 2;

    public function __construct(public string $value)
    {
        if (strlen($value) !== self::STATE_CODE_LENGTH) {
            throw new InvalidArgumentException('State is not a valid.');
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
