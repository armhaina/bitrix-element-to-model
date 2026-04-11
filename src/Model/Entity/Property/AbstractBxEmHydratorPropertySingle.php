<?php

declare(strict_types=1);

namespace BxEmHydrator\Model\Entity\Property;

abstract class AbstractBxEmHydratorPropertySingle extends AbstractBxEmHydratorProperty
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