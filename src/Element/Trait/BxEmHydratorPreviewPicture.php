<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Trait;

use BxEmHydrator\Element\Model\Entity\Attachment\BxEmHydratorFileAttachment;

trait BxEmHydratorPreviewPicture
{
    protected ?BxEmHydratorFileAttachment $previewPicture = null;

    public function getPreviewPicture(): ?BxEmHydratorFileAttachment
    {
        return $this->previewPicture;
    }

    public function setPreviewPicture(BxEmHydratorFileAttachment $previewPicture): self
    {
        $this->previewPicture = $previewPicture;

        return $this;
    }
}