<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Trait;

use BxEmHydrator\Element\Model\Entity\Attachment\BxEmHydratorSectionAttachment;

trait BxEmHydratorIblockSectionId
{
    protected ?BxEmHydratorSectionAttachment $iblockSectionId = null;

    public function getIblockSectionId(): ?BxEmHydratorSectionAttachment
    {
        return $this->iblockSectionId;
    }

    public function setIblockSectionId(BxEmHydratorSectionAttachment $iblockSectionId): self
    {
        $this->iblockSectionId = $iblockSectionId;

        return $this;
    }
}