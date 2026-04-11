<?php

declare(strict_types=1);

namespace BxEmHydrator\Exception;

class BxEmHydratorDataTypeUnauthorizedException extends \InvalidArgumentException
{
    public function __construct(string $type, array $acceptableTypes)
    {
        $message = sprintf(
            'Переданный тип данных: %s не является классом и не входит в один из разрешенных типов данных: %s.',
            $type,
            implode(separator: ', ', array: $acceptableTypes)
        );

        parent::__construct(message: $message);
    }
}
