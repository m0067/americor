<?php

declare(strict_types=1);

namespace Tests\Presentation\Cli;

use Americor\Presentation\Cli\MakeCreditDecisionCli;
use PHPUnit\Framework\TestCase;

class MakeCreditDecisionCliTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testDecision(array $data, string $expectedResult)
    {
        $createClientCli = new MakeCreditDecisionCli();
        $createClientCli->run(json_encode($data));
        $this->expectOutputString($expectedResult);
    }

    public function dataProvider(): array
    {
        return [
            [
                'approved' => [
                    'ssn' => '123-12-1234',
                    'clientEmail' => 'email@email.em',
                    'monthlyIncome' => 6000,
                    'age' => 20,
                    'state' => 'NV',
                ],
                '{"isApproved":true,"message":"Your credit has been approved. Interest rate: 12%.","interestRate":12,"productName":"ProductCredit","termInMonths":12,"amount":120000}'
            ],
            [
                'rejected' => [
                    'ssn' => '123-12-1234',
                    'clientEmail' => 'email@email.em',
                    'monthlyIncome' => 800,
                    'age' => 20,
                    'state' => 'NV',
                ],
                '{"isApproved":false,"message":"Unfortunately, your credit was not approved. Reason: The monthly income is too low.","interestRate":12,"productName":"ProductCredit","termInMonths":12,"amount":120000}'
            ],
        ];
    }
}
