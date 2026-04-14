<?php

declare(strict_types=1);

namespace BxEmHydrator\Model\Entity\Property\Type;

use BxEmHydrator\Model\Entity\Property\AbstractBxEmHydratorPropertySingle;

class BxEmHydratorBooleanProperty extends AbstractBxEmHydratorPropertySingle
{
    protected bool $value;

    public function getValue(): bool
    {
        return $this->value;
    }

    public function setValue(bool $value): self
    {
        $this->value = $value;

        return $this;
    }
}