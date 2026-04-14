<?php

declare(strict_types=1);

namespace BxEmHydrator;
;
use BxEmHydrator\Element\BxEmHydratorElement;
use DateMalformedStringException;
use ReflectionException;

class BxEmHydrator
{
    /**
     * @throws ReflectionException
     * @throws DateMalformedStringException
     */
    public static function element(\_CIBElement $item, string $className, array $rules = []): object
    {
        return BxEmHydratorElement::exec(item: $item, className: $className, rules: $rules);
    }
}
