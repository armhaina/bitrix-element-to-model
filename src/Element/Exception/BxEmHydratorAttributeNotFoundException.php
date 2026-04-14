<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Exception;

class BxEmHydratorAttributeNotFoundException extends \RuntimeException
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
