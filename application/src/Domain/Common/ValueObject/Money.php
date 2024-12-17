<?php

declare(strict_types=1);

namespace Americor\Domain\Common\ValueObject;

use InvalidArgumentException;

final readonly class Money extends AbstractValueObject
{
    private const CURRENCY_CODE_LENGTH = 3;

    public function __construct(public float $amount, public string $currency)
    {
        if ($amount < 0) {
            throw new InvalidArgumentException('Amount cannot be negative');
        }

        if (strlen($currency) !== self::CURRENCY_CODE_LENGTH) {
            throw new InvalidArgumentException('Currency is not a valid.');
        }
    }

    public function __toString(): string
    {
        return sprintf("%s %s", $this->amount, $this->currency);
    }
}
