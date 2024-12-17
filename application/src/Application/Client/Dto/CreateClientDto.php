<?php

declare(strict_types=1);

namespace Americor\Application\Client\Dto;

use Americor\Application\Common\Dto\BaseDto;

class CreateClientDto extends BaseDto
{
    public function __construct(
        public string $ssn,
        public string $firstName,
        public string $lastName,
        public int $age,
        public AddressDto $address,
        public string $email,
        public string $phoneNumber,
        public float $monthlyIncome,
    ) {
    }
}
