<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Handler;

readonly class Clr
{
    /**
     * Очистить пустые и невалидные поля элемента
     */
    public static function fields(array $fields): array
    {
        return array_filter(
            array: $fields,
            callback: function ($value, $key) {
                if (str_starts_with($key, '~')) {
                    return false;
                }

                if ($value === null || $value === '') {
                    return false;
                }

                return true;
            },
            mode: ARRAY_FILTER_USE_BOTH
        );
    }

    /**
     * Очистить пустые и невалидные поля элемента
     */
    public static function properties(array $properties, array $fields): array
    {
        $list = [];
        $propertiesSlc = [];

        foreach ($properties as $field => $property) {
            if (empty($property['VALUE'])) {
                continue;
            }

            $list[$field] = self::fields(fields: $property);
        }

        foreach ($fields as $key => $value) {
            if (str_starts_with($key, 'PROPERTY_') && str_ends_with($key, '_VALUE')) {
                $propertiesSlc[substr(string: $key, offset: 9, length: -6)] = $value;
            }
        }

        return array_intersect_key($list, $propertiesSlc);
    }
}
