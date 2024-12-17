<?php

declare(strict_types=1);

namespace Americor\Application\Client\Dto;

use Americor\Application\Common\Dto\BaseDto;

class AddressDto extends BaseDto
{
    public function __construct(
        public string $street,
        public string $city,
        public string $state,
        public string $zip
    ) {
    }
}
