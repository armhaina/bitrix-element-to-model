<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Exception;

class BxEmHydratorValueNotRuleException extends \InvalidArgumentException
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
