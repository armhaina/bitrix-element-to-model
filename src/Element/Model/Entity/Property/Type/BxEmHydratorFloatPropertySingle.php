<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Model\Entity\Property\Type;

use BxEmHydrator\Element\Model\Entity\Property\AbstractBxEmHydratorPropertySingle;

class BxEmHydratorFloatPropertySingle extends AbstractBxEmHydratorPropertySingle
{
    protected float $value;

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }
}