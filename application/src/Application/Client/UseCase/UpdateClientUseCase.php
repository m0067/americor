<?php

declare(strict_types=1);

namespace Americor\Application\Client\UseCase;

use Americor\Application\Client\Dto\UpdateClientDto;
use Americor\Application\Common\Dto\OkDto;
use Americor\Domain\Client\Repository\ClientRepositoryInterface;
use Americor\Domain\Client\ValueObject\Email;
use Americor\Domain\Common\ValueObject\Name;
use Americor\Domain\Common\ValueObject\Ssn;

class UpdateClientUseCase
{
    public function __construct(private ClientRepositoryInterface $clientRepository)
    {
    }

    public function execute(UpdateClientDto $updateClientDto): OkDto
    {
        //TODO
        $client = $this->clientRepository->findBySsn(new Ssn($updateClientDto->ssn));

        if ($updateClientDto->email) {
            $client->updateEmail(new Email($updateClientDto->email));
        }

        if ($updateClientDto->lastName) {
            $client->updateLastName(new Name($updateClientDto->lastName));
        }

        $this->clientRepository->save($client);

        return new OkDto();
    }
}
