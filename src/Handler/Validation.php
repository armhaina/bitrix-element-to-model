<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Handler;

use BitrixElementHydrator\Contract\HydratorRuleInterface;
use BitrixElementHydrator\Exception\HydratorValueNotRuleException;

readonly class Validation
{
    public static function rules(array $rules): void
    {
        foreach ($rules as $rule) {
            if ($rule instanceof HydratorRuleInterface) {
                continue;
            }

            throw new HydratorValueNotRuleException(value: $rule);
        }
    }
}
