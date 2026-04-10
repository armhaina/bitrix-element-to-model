<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Entity\Property\Type;

use BitrixElementHydrator\Model\Entity\Property\AbstractHydratorPropertySingle;

class HydratorFloatPropertySingle extends AbstractHydratorPropertySingle
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