<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Model\Rule;

use BxEmHydrator\Element\Contract\BxEmHydratorRuleInterface;
use BxEmHydrator\Element\Exception\BxEmHydratorDataTypeNotStringException;

readonly class BxEmHydratorDataRelatedRule implements BxEmHydratorRuleInterface
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
