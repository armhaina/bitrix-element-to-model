<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Handler;

use BxEmHydrator\Element\Contract\BxEmHydratorRuleInterface;
use BxEmHydrator\Element\Exception\BxEmHydratorValueNotRuleException;

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
