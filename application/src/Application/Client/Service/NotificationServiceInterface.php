<?php

declare(strict_types=1);

namespace Americor\Application\Client\Service;

use Americor\Application\Client\Dto\NotificationDto;

interface NotificationServiceInterface
{
    public function notify(NotificationDto $notificationDto): void;
}
