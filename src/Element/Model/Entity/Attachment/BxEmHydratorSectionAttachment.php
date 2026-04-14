<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Model\Entity\Attachment;

use BxEmHydrator\Element\Contract\BxEmHydratorEntityAttachmentInterface;

class BxEmHydratorSectionAttachment implements BxEmHydratorEntityAttachmentInterface
{
    protected int $id;
    protected ?string $timestampX = null;
    protected ?string $dateCreate = null;
    protected ?int $iblockId = null;
    protected ?bool $active = null;
    protected ?bool $globalActive = null;
    protected ?int $sort = null;
    protected ?string $name = null;
    protected ?int $leftMargin = null;
    protected ?int $rightMargin = null;
    protected ?int $depthLevel = null;
    protected ?string $descriptionType = null;
    protected ?string $searchableContent = null;
    protected ?string $listPageUrl = null;
    protected ?string $sectionPageUrl = null;
    protected ?string $iblockTypeId = null;
    protected ?string $iblockCode = null;

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

    public function getDateCreate(): ?\DateTimeImmutable
    {
        if ($this->dateCreate) {
            return new \DateTimeImmutable(datetime: $this->dateCreate);
        }

        return null;
    }

    public function setDateCreate(string $dateCreate): self
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    public function getIblockId(): ?int
    {
        return $this->iblockId;
    }

    public function setIblockId(int $iblockId): self
    {
        $this->iblockId = $iblockId;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getGlobalActive(): ?bool
    {
        return $this->globalActive;
    }

    public function setGlobalActive(bool $globalActive): self
    {
        $this->globalActive = $globalActive;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLeftMargin(): ?int
    {
        return $this->leftMargin;
    }

    public function setLeftMargin(int $leftMargin): self
    {
        $this->leftMargin = $leftMargin;

        return $this;
    }

    public function getRightMargin(): ?int
    {
        return $this->rightMargin;
    }

    public function setRightMargin(int $rightMargin): self
    {
        $this->rightMargin = $rightMargin;

        return $this;
    }

    public function getDepthLevel(): ?int
    {
        return $this->depthLevel;
    }

    public function setDepthLevel(int $depthLevel): self
    {
        $this->depthLevel = $depthLevel;

        return $this;
    }

    public function getDescriptionType(): ?string
    {
        return $this->descriptionType;
    }

    public function setDescriptionType(string $descriptionType): self
    {
        $this->descriptionType = $descriptionType;

        return $this;
    }

    public function getSearchableContent(): ?string
    {
        return $this->searchableContent;
    }

    public function setSearchableContent(string $searchableContent): self
    {
        $this->searchableContent = $searchableContent;

        return $this;
    }

    public function getListPageUrl(): ?string
    {
        return $this->listPageUrl;
    }

    public function setListPageUrl(string $listPageUrl): self
    {
        $this->listPageUrl = $listPageUrl;

        return $this;
    }

    public function getSectionPageUrl(): ?string
    {
        return $this->sectionPageUrl;
    }

    public function setSectionPageUrl(string $sectionPageUrl): self
    {
        $this->sectionPageUrl = $sectionPageUrl;

        return $this;
    }

    public function getIblockTypeId(): ?string
    {
        return $this->iblockTypeId;
    }

    public function setIblockTypeId(string $iblockTypeId): self
    {
        $this->iblockTypeId = $iblockTypeId;

        return $this;
    }

    public function getIblockCode(): ?string
    {
        return $this->iblockCode;
    }

    public function setIblockCode(string $iblockCode): self
    {
        $this->iblockCode = $iblockCode;

        return $this;
    }
}