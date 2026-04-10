<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Exception;

class HydratorDataTypeNotStringException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        $message = sprintf(
            'Переданный тип данных: %s не является строкой.',
            $value,
        );

        parent::__construct(message: $message);
    }
}
