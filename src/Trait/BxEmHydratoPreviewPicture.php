<?php

declare(strict_types=1);

namespace BxEmHydrator\Trait;

use BxEmHydrator\Model\Entity\Attachment\BxEmHydratorFileAttachment;

trait BxEmHydratoPreviewPicture
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