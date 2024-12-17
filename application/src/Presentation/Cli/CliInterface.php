<?php

declare(strict_types=1);

namespace Americor\Presentation\Cli;

interface CliInterface
{
    public function run(string $jsonData): bool;
}
