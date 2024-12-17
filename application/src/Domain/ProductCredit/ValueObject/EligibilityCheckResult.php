<?php

declare(strict_types=1);

namespace Americor\Domain\ProductCredit\ValueObject;

use Americor\Common\Enum\CreditStatusEnum;
use Americor\Domain\Common\ValueObject\AbstractValueObject;

final readonly class EligibilityCheckResult extends AbstractValueObject
{
    public function __construct(public CreditStatusEnum $creditStatus, public string $message)
    {
    }

    public function __toString(): string
    {
        return $this->creditStatus->value . $this->message;
    }
}
