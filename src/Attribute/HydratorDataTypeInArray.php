<?php

namespace BitrixElementHydrator\Attribute;

use BitrixElementHydrator\Exception\HydratorDataTypeUnauthorizedException;

/**
 * Атрибут для указания типов данных, которые содержатся в массиве
 */
#[\Attribute]
readonly class HydratorDataTypeInArray
{
    private const array ACCEPTABLE_TYPES = ['string', 'integer', 'float'];

    public function __construct(private string $typeOrClassName)
    {
        if (in_array(needle: $typeOrClassName, haystack: self::ACCEPTABLE_TYPES)) {
            return;
        }

        if (class_exists(class: $typeOrClassName)) {
            return;
        }

        throw new HydratorDataTypeUnauthorizedException(type: $typeOrClassName, acceptableTypes: self::ACCEPTABLE_TYPES);
    }

    public function getTypeOrClassName(): string
    {
        return $this->typeOrClassName;
    }
}
