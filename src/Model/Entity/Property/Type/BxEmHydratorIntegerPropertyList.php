<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Entity\Property\Type;

use BitrixElementHydrator\Attribute\BxEmHydratorDataTypeInArray;
use BitrixElementHydrator\Model\Entity\Property\AbstractBxEmHydratorPropertyList;

class BxEmHydratorIntegerPropertyList extends AbstractBxEmHydratorPropertyList
{
    #[BxEmHydratorDataTypeInArray(typeOrClassName: 'integer')]
    protected array $value;

    public function getValue(): array
    {
        return $this->value;
    }

    public function setValue(array $value): self
    {
        $this->value = $value;

        return $this;
    }
}