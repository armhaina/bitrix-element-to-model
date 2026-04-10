<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Exception;

class HydratorValueNotRuleException extends \InvalidArgumentException
{
    public function __construct(mixed $value)
    {
        $message = sprintf(
            'Переданный значение: %s не является правилом (моделью).',
            $value,
        );

        parent::__construct(message: $message);
    }
}
