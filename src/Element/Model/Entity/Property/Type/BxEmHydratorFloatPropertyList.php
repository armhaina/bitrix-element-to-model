<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Model\Entity\Property\Type;

use BxEmHydrator\Element\Attribute\BxEmHydratorDataTypeInArray;
use BxEmHydrator\Element\Model\Entity\Property\AbstractBxEmHydratorPropertyList;

class BxEmHydratorFloatPropertyList extends AbstractBxEmHydratorPropertyList
{
    #[BxEmHydratorDataTypeInArray(typeOrClassName: 'float')]
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