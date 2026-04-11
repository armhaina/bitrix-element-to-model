<?php

declare(strict_types=1);

namespace BxEmHydrator\Model\Entity\Property;

use BxEmHydrator\Attribute\BxEmHydratorDataTypeInArray;

abstract class AbstractBxEmHydratorPropertyList extends AbstractBxEmHydratorProperty
{
    #[BxEmHydratorDataTypeInArray(typeOrClassName: 'integer')]
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