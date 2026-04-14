<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Model\Entity\Property\Type;

use BxEmHydrator\Element\Model\Entity\Property\AbstractBxEmHydratorPropertySingle;

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