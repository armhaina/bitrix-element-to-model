<?php

declare(strict_types=1);

namespace BxEmHydrator\Trait;

use BxEmHydrator\Model\Entity\Attachment\BxEmHydratorFileAttachment;

trait BxEmHydratoDetailPicture
{
    protected ?BxEmHydratorFileAttachment $detailPicture = null;

    public function getDetailPicture(): ?BxEmHydratorFileAttachment
    {
        return $this->detailPicture;
    }

    public function setDetailPicture(BxEmHydratorFileAttachment $detailPicture): self
    {
        $this->detailPicture = $detailPicture;

        return $this;
    }
}