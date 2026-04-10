<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Handler;

use BitrixElementHydrator\Model\Configure;
use BitrixElementHydrator\Model\Rule\HydratorDataRelatedRule;

readonly class Rule
{
    /**
     * @throws \ReflectionException
     */
    public static function dataRelated(Configure $configure): bool
    {
        foreach ($configure->getRules() as $rule) {
            if (!($rule instanceof HydratorDataRelatedRule)) {
                continue;
            }

            if ($configure->getDataType() === 'array' && class_exists(class: $configure->getDataTypeInArray())) {
                return in_array($configure->getFieldRoot(), $rule->getFields());
            }

            $name = mb_strtoupper(string: Rfl::name(objectOrClass: $configure->getClassNameRoot()));

            // Проверяем что в правилах есть поле связанного запроса для любой сущности
            if (in_array($configure->getFieldRoot(), $rule->getFields())) {
                return true;
            }

            // Проверяем что в правилах есть поле связанного запроса для корневой сущности
            if (in_array($name . '.' . $configure->getFieldRoot(), $rule->getFields())) {
                return true;
            }

            return in_array($configure->getField(), $rule->getFields());
        }

        return false;
    }
}
