<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Exception;

class HydratorAttributeNotFoundException extends \RuntimeException
{
    public function __construct(string $attribute)
    {
        $message = sprintf(
            'Не указан обязательный атрибут для типа данных array: %s.',
            $attribute,
        );

        parent::__construct(message: $message);
    }
}
