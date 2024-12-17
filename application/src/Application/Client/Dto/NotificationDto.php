<?php

declare(strict_types=1);

namespace Americor\Application\Client\Dto;

use Americor\Application\Common\Dto\BaseDto;

class NotificationDto extends BaseDto
{
    public function __construct(public string $to, public string $subject, public string $body)
    {
    }
}
