<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Handler;

use ReflectionException;

readonly class Rfl
{
    /**
     * @throws ReflectionException
     */
    public static function type(object $model, string $method): string
    {
        $reflectionMethod = new \ReflectionMethod(objectOrMethod: $model, method: $method);
        $reflectionParameter = $reflectionMethod->getParameters()[0];
        $parameterType = $reflectionParameter->getType();

        return $parameterType->getName();
    }

    /**
     * @throws ReflectionException
     */
    public static function attribute(string $attributeName, string $className, string $property): ?object
    {
        $attribute = null;
        $reflectionProperty = new \ReflectionProperty(class: $className, property: $property);

        $propertyAttributes = $reflectionProperty->getAttributes(name: $attributeName);

        foreach ($propertyAttributes as $attribute) {
            $attribute = $attribute->newInstance();
            break;
        }

        return $attribute;
    }

    /**
     * @throws ReflectionException
     */
    public static function name(string|object $objectOrClass): string
    {
        return new \ReflectionClass(objectOrClass: $objectOrClass)->getShortName();
    }
}
