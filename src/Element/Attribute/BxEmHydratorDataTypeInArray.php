<?php

namespace BxEmHydrator\Element\Attribute;

use BxEmHydrator\Element\Exception\BxEmHydratorDataTypeUnauthorizedException;

/**
 * Атрибут для указания типов данных, которые содержатся в массиве
 */
#[\Attribute]
readonly class BxEmHydratorDataTypeInArray
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

        throw new BxEmHydratorDataTypeUnauthorizedException(type: $typeOrClassName, acceptableTypes: self::ACCEPTABLE_TYPES);
    }

    public function getTypeOrClassName(): string
    {
        return $this->typeOrClassName;
    }
}
