<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Trait;

use BxEmHydrator\Element\Model\Entity\Attachment\BxEmHydratorFileAttachment;

trait BxEmHydratorDetailPicture
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