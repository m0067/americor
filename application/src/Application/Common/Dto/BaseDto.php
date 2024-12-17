<?php

declare(strict_types=1);

namespace Americor\Application\Common\Dto;

class BaseDto
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public static function fromArray(array $data): static
    {
        $class = new \ReflectionClass(static::class);
        $constructor = $class->getConstructor();
        $arguments = [];

        if ($constructor !== null) {
            $parameters = $constructor->getParameters();

            foreach ($parameters as $parameter) {
                $paramName = $parameter->getName();
                if (isset($data[$paramName])) {
                    $arguments[] = $data[$paramName];
                } else {
                    $arguments[] = $parameter->isDefaultValueAvailable() ? $parameter->getDefaultValue() : null;
                }
            }
        }

        return $class->newInstanceArgs($arguments);
    }
}
