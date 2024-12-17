<?php

declare(strict_types=1);

namespace Americor\Domain\Common\Enum;

enum AddressStateEnum: string
{
    case CA = 'CA';
    case NV = 'NV';
    case NY = 'NY';

    public static function LIST_ALLOWED(): array
    {
        return [
            self::CA->value,
            self::NV->value,
            self::NY->value,
        ];
    }

    public static function RANDOM_ALLOWED(): string
    {
        return self::NY->value;
    }
}
