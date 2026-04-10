<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Entity\Property\Type;

use BitrixElementHydrator\Attribute\HydratorDataTypeInArray;
use BitrixElementHydrator\Model\Entity\Property\AbstractHydratorPropertyList;

class HydratorStringPropertyList extends AbstractHydratorPropertyList
{
    #[HydratorDataTypeInArray(typeOrClassName: 'string')]
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