<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Entity\Property\Type;

use BitrixElementHydrator\Model\Entity\Property\AbstractBxEmHydratorPropertySingle;

class BxEmHydratorIntegerPropertySingle extends AbstractBxEmHydratorPropertySingle
{
    protected int $value;

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}