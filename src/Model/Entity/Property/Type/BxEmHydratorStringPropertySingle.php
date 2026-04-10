<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Entity\Property\Type;

use BitrixElementHydrator\Model\Entity\Property\AbstractBxEmHydratorPropertySingle;

class BxEmHydratorStringPropertySingle extends AbstractBxEmHydratorPropertySingle
{
    protected string $value;

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}