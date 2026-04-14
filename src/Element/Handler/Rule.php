<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Handler;

use BxEmHydrator\Element\Model\BxEmHydratorConfigure;
use BxEmHydrator\Element\Model\Rule\BxEmHydratorDataRelatedRule;

readonly class Rule
{
    /**
     * @throws \ReflectionException
     */
    public static function dataRelated(BxEmHydratorConfigure $configure): bool
    {
        foreach ($configure->getRules() as $rule) {
            if (!($rule instanceof BxEmHydratorDataRelatedRule)) {
                continue;
            }

            if ($configure->getDataType() === 'array' && class_exists(class: $configure->getDataTypeInArray())) {
                return in_array($configure->getField(), $rule->getFields());
            }

            $name = mb_strtoupper(string: Rfl::name(objectOrClass: $configure->getClassNameRoot()));

            // Проверяем что в правилах есть поле связанного запроса для любой сущности
            if (in_array(needle: $configure->getField(), haystack: $rule->getFields())) {
                return true;
            }

            // Проверяем что в правилах есть поле связанного запроса для корневой сущности
            if (in_array(needle: $name . '.' . $configure->getField(), haystack: $rule->getFields())) {
                return true;
            }

            return in_array($configure->getField(), $rule->getFields());
        }

        return false;
    }
}
