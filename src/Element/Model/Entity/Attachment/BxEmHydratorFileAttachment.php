<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Model\Entity\Attachment;

use BxEmHydrator\Element\Contract\BxEmHydratorEntityAttachmentInterface;

class BxEmHydratorFileAttachment implements BxEmHydratorEntityAttachmentInterface
{
    protected int $id;
    protected ?string $timestampX = null;
    protected ?string $moduleId = null;
    protected ?int $height = null;
    protected ?int $width = null;
    protected ?int $fileSize = null;
    protected ?string $contentType = null;
    protected ?string $subdir = null;
    protected ?string $fileName = null;
    protected ?string $originalName = null;
    protected ?string $externalId = null;
    protected ?string $src = null;
    protected ?string $extension = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTimestampX(): ?\DateTimeImmutable
    {
        if ($this->timestampX) {
            return new \DateTimeImmutable(datetime: $this->timestampX);
        }

        return null;
    }

    public function setTimestampX(string $timestampX): self
    {
        $this->timestampX = $timestampX;

        return $this;
    }

    public function getModuleId(): ?string
    {
        return $this->moduleId;
    }

    public function setModuleId(string $moduleId): self
    {
        $this->moduleId = $moduleId;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    public function setFileSize(int $fileSize): self
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function setContentType(string $contentType): self
    {
        $this->contentType = $contentType;

        return $this;
    }

    public function getSubdir(): ?string
    {
        return $this->subdir;
    }

    public function setSubdir(string $subdir): self
    {
        $this->subdir = $subdir;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }
}