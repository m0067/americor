<?php

declare(strict_types=1);

namespace Americor\Application\Client\Dto;

use Americor\Application\Common\Dto\BaseDto;

class UpdateClientDto extends BaseDto
{
    public function __construct(
        public string $ssn,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?int $age = null,
        public ?AddressDto $address = null,
        public ?string $email = null,
        public ?string $phoneNumber = null,
        public ?float $monthlyIncome = null,
    ) {
    }
}
