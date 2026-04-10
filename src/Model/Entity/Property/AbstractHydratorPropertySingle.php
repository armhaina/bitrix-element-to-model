<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Entity\Property;

abstract class AbstractHydratorPropertySingle extends AbstractHydratorProperty
{
    protected int $propertyValueId;

    public function getPropertyValueId(): int
    {
        return $this->propertyValueId;
    }

    public function setPropertyValueId(int $propertyValueId): self
    {
        $this->propertyValueId = $propertyValueId;

        return $this;
    }
}