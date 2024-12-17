<?php

declare(strict_types=1);

namespace Americor\Domain\Common\ValueObject;

use Stringable;

abstract readonly class AbstractValueObject implements Stringable
{
    public function equals(AbstractValueObject $other): bool
    {
        if (get_class($this) !== get_class($other)) {
            return false;
        }

        return get_object_vars($this) === get_object_vars($other);
    }
}
