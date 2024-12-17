<?php

declare(strict_types=1);

namespace Americor\Domain\Client\ValueObject;

use Americor\Domain\Common\ValueObject\AbstractValueObject;
use InvalidArgumentException;

final readonly class FicoCreditScore extends AbstractValueObject
{
    private const SCORE_MIN = 300;
    private const SCORE_MAX = 850;

    public function __construct(public int $value)
    {
        if ($value < self::SCORE_MIN || $value > self::SCORE_MAX) {
            throw new InvalidArgumentException(
                'FICO credit score must be between ' . self::SCORE_MIN . ' and ' . self::SCORE_MAX . '.'
            );
        }
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }
}
