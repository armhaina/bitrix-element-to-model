<?php

declare(strict_types=1);

namespace BxEmHydrator\Model\Entity\Property\Type;

use BxEmHydrator\Model\Entity\Property\AbstractBxEmHydratorPropertySingle;

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