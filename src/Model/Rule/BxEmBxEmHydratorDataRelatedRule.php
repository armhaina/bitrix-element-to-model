<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Rule;

use BitrixElementHydrator\Contract\BxEmHydratorRuleInterface;
use BitrixElementHydrator\Exception\BxEmHydratorDataTypeNotStringException;

readonly class BxEmBxEmHydratorDataRelatedRule implements BxEmHydratorRuleInterface
{
    public function __construct(private array $fields)
    {
        $this->validateFields(fields: $fields);
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    private function validateFields(array $fields): void
    {
        foreach ($fields as $field) {
            if (is_string(value: $field)) {
                continue;
            }

            throw new BxEmHydratorDataTypeNotStringException(value: $field);
        }
    }
}
