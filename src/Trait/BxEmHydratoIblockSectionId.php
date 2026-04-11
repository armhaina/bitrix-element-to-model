<?php

declare(strict_types=1);

namespace BxEmHydrator\Trait;

use BxEmHydrator\Model\Entity\Attachment\BxEmHydratorFileAttachment;
use BxEmHydrator\Model\Entity\Attachment\BxEmHydratorSectionAttachment;

trait BxEmHydratoIblockSectionId
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