<?php

declare(strict_types=1);

namespace Americor\Application\Client\UseCase;

use Americor\Application\Client\Dto\NotificationDto;
use Americor\Application\Client\Service\NotificationServiceInterface;
use Americor\Application\Common\Dto\OkDto;

class NotifyClientUseCase
{
    public function __construct(private NotificationServiceInterface $notificationService)
    {
    }

    public function execute(NotificationDto $notificationDto): OkDto
    {
        $this->notificationService->notify($notificationDto);

        return new OkDto();
    }
}
