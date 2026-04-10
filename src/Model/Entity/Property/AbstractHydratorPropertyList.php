<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Entity\Property;

use BitrixElementHydrator\Attribute\HydratorDataTypeInArray;

abstract class AbstractHydratorPropertyList extends AbstractHydratorProperty
{
    #[HydratorDataTypeInArray(typeOrClassName: 'integer')]
    protected array $propertyValueId;

    public function getPropertyValueId(): array
    {
        return $this->propertyValueId;
    }

    public function setPropertyValueId(array $propertyValueId): self
    {
        $this->propertyValueId = $propertyValueId;

        return $this;
    }
}