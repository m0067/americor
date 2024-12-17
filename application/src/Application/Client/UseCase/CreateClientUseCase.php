<?php

declare(strict_types=1);

namespace Americor\Application\Client\UseCase;

use Americor\Application\Client\Dto\CreateClientDto;
use Americor\Application\Client\Enum\CurrencyEnum;
use Americor\Application\Common\Dto\OkDto;
use Americor\Domain\Client\Entity\Client;
use Americor\Domain\Client\Repository\ClientRepositoryInterface;
use Americor\Domain\Client\ValueObject\Address;
use Americor\Domain\Client\ValueObject\Age;
use Americor\Domain\Client\ValueObject\Email;
use Americor\Domain\Client\ValueObject\PhoneNumber;
use Americor\Domain\Common\ValueObject\AddressState;
use Americor\Domain\Common\ValueObject\Money;
use Americor\Domain\Common\ValueObject\Name;
use Americor\Domain\Common\ValueObject\Ssn;

class CreateClientUseCase
{
    public function __construct(private ClientRepositoryInterface $clientRepository)
    {
    }

    public function execute(CreateClientDto $createClientDto): OkDto
    {
        //TODO should be some mapper here
        $client = new Client(
            new Ssn($createClientDto->ssn),
            new Name($createClientDto->lastName),
            new Name($createClientDto->firstName),
            new Age($createClientDto->age),
            new Address(
                $createClientDto->address->street,
                $createClientDto->address->city,
                new AddressState($createClientDto->address->state),
                $createClientDto->address->zip,
            ),
            new Email($createClientDto->email),
            new PhoneNumber($createClientDto->phoneNumber),
            new Money($createClientDto->monthlyIncome, CurrencyEnum::USD->value),
        );
        $this->clientRepository->save($client);

        return new OkDto();
    }
}
