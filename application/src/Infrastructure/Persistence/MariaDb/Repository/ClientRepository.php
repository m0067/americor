<?php

declare(strict_types=1);

namespace Americor\Infrastructure\Persistence\MariaDb\Repository;

use Americor\Domain\Client\Entity\Client;
use Americor\Domain\Client\Repository\ClientRepositoryInterface;
use Americor\Domain\Common\ValueObject\Ssn;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * TODO $db should have an interface like DbInterface with a send method. Here for informational purposes only
     * @param DbInterface $db
     */
    public function __construct(private $db)
    {
    }

    /**
     * TODO
     * @param Client $client
     * @return void
     */
    public function save(Client $client): void
    {
        $this->db->query("INSERT INTO clients (ssl, ...) VALUES (?, ...)", $client);
    }

    /**
     * TODO
     * @param Ssn $ssn
     * @return Client|null
     */
    public function findBySsn(Ssn $ssn): ?Client
    {
        $result = $this->db->query("SELECT ssn, ... FROM clients WHERE ssn = ?", [$ssn->ssn]);

        if ($result) {
            return new Client($result);
        }

        return null;
    }
}
