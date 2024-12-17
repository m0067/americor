<?php

declare(strict_types=1);

namespace Tests\Presentation\Cli;

use Americor\Presentation\Cli\CreateClientCli;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CreateClientCliTest extends TestCase
{
    /**
     * @dataProvider clientProvider
     */
    public function testCreateClient(array $data, bool $expectedResult)
    {
        if (!$expectedResult) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectExceptionMessage('Invalid SSN format.');
        }

        $createClientCli = new CreateClientCli();
        $ok = $createClientCli->run(json_encode($data));
        $this->assertEquals($expectedResult, $ok);
    }

    public function clientProvider(): array
    {
        return [
            [
                'client has been created' => [
                    'address' => [
                        'street' => 'street',
                        'city' => 'city',
                        'state' => 'NY',
                        'zip' => 'zip',
                    ],
                    'firstName' => 'firstName',
                    'lastName' => 'lastName',
                    'age' => 20,
                    'monthlyIncome' => 5000,
                    'ssn' => '123-12-1234',
                    'email' => 'email@email.em',
                    'phoneNumber' => '+1234567890',
                ],
                true
            ],
            [
                'client has not been created' => [
                    'address' => [
                        'street' => 'street',
                        'city' => 'city',
                        'state' => 'NY',
                        'zip' => 'zip',
                    ],
                    'firstName' => 'firstName',
                    'lastName' => 'lastName',
                    'age' => 20,
                    'monthlyIncome' => 6000,
                    'ssn' => '123423423423423412-12-1234',
                    'email' => 'email@email.em',
                    'phoneNumber' => '+1234567890',
                ],
                false
            ],
        ];
    }
}
