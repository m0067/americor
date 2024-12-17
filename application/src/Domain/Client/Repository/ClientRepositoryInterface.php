<?php

declare(strict_types=1);

namespace Americor\Domain\Client\Repository;

use Americor\Domain\Client\Entity\Client;
use Americor\Domain\Common\ValueObject\Ssn;

interface ClientRepositoryInterface
{
    public function save(Client $client): void;

    public function findBySsn(Ssn $ssn): ?Client;
}
