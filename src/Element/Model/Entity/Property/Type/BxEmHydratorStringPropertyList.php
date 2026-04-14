<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Model\Entity\Property\Type;

use BxEmHydrator\Element\Attribute\BxEmHydratorDataTypeInArray;
use BxEmHydrator\Element\Model\Entity\Property\AbstractBxEmHydratorPropertyList;

class BxEmHydratorStringPropertyList extends AbstractBxEmHydratorPropertyList
{
    #[BxEmHydratorDataTypeInArray(typeOrClassName: 'string')]
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