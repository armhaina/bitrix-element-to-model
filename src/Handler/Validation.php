<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Handler;

use BitrixElementHydrator\Contract\BxEmHydratorRuleInterface;
use BitrixElementHydrator\Exception\BxEmHydratorValueNotRuleException;

readonly class Validation
{
    public static function rules(array $rules): void
    {
        foreach ($rules as $rule) {
            if ($rule instanceof BxEmHydratorRuleInterface) {
                continue;
            }

            throw new BxEmHydratorValueNotRuleException(value: $rule);
        }
    }
}
