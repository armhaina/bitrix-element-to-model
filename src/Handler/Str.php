<?php

declare(strict_types=1);

namespace BxEmHydrator\Handler;

readonly class Str
{
    /**
     * DETAIL_PAGE_URl => DetailPageUrl
     */
    public static function snakeToPascalCase(string $string): string
    {
        return str_replace(
            search: '_',
            replace: '',
            subject: ucwords(
                string: strtolower(string: $string),
                separators: '_'
            )
        );
    }

    /**
     * DETAIL_PAGE_URl => detailPageUrl
     */
    public static function snakeToCamelCase(string $string): string
    {
        $parts = explode(separator: '_', string: strtolower(string: $string));
        $camelCase = array_shift($parts);

        foreach ($parts as $part) {
            $camelCase .= ucfirst(string: $part);
        }

        return $camelCase;
    }
}
