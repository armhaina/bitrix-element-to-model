<?php

declare(strict_types=1);

namespace BxEmHydrator\Model\Entity;

use BxEmHydrator\Contract\BxEmHydratorEntityInterface;
use BxEmHydrator\Model\Entity\Attachment\BxEmHydratorFileAttachment;
use BxEmHydrator\Model\Entity\Attachment\BxEmHydratorSectionAttachment;

abstract class AbstractBxEmHydratorEntity implements BxEmHydratorEntityInterface
{
    protected int $id;
    protected ?string $name = null;
    protected ?int $sort = null;
    protected ?string $timestampX = null;
    protected ?int $timestampXUnix = null;
    protected ?string $dateCreate = null;
    protected ?int $dateCreateUnix = null;
    protected ?int $iblockId = null;
    protected ?bool $active = null;
    protected ?string $previewText = null;
    protected ?string $previewTextType = null;
    protected ?string $detailText = null;
    protected ?string $detailTextType = null;
    protected ?string $searchableContent = null;
    protected ?int $wfStatusId = null;
    protected ?string $lockStatus = null;
    protected ?string $wfDateLock = null;
    protected ?bool $inSections = null;
    protected ?string $showCounterStart = null;
    protected ?string $showCounterStartX = null;
    protected ?int $xmlId = null;
    protected ?int $externalId = null;
    protected ?int $tmpId = null;
    protected ?string $userName = null;
    protected ?string $createdUserName = null;
    protected ?string $langDir = null;
    protected ?string $lid = null;
    protected ?string $iblockTypeId = null;
    protected ?string $iblockCode = null;
    protected ?string $iblockName = null;
    protected ?string $detailPageUrl = null;
    protected ?string $listPageUrl = null;
    protected ?string $createdDate = null;
    protected ?bool $bpPublished = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

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

    public function getTimestampXUnix(): ?int
    {
        return $this->timestampXUnix;
    }

    public function setTimestampXUnix(int $timestampXUnix): self
    {
        $this->timestampXUnix = $timestampXUnix;

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

    public function getDateCreateUnix(): ?int
    {
        return $this->dateCreateUnix;
    }

    public function setDateCreateUnix(int $dateCreateUnix): self
    {
        $this->dateCreateUnix = $dateCreateUnix;

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

    public function getPreviewText(): ?string
    {
        return $this->previewText;
    }

    public function setPreviewText(string $previewText): self
    {
        $this->previewText = $previewText;

        return $this;
    }

    public function getPreviewTextType(): ?string
    {
        return $this->previewTextType;
    }

    public function setPreviewTextType(string $previewTextType): self
    {
        $this->previewTextType = $previewTextType;

        return $this;
    }

    public function getDetailText(): ?string
    {
        return $this->detailText;
    }

    public function setDetailText(string $detailText): self
    {
        $this->detailText = $detailText;

        return $this;
    }

    public function getDetailTextType(): ?string
    {
        return $this->detailTextType;
    }

    public function setDetailTextType(string $detailTextType): self
    {
        $this->detailTextType = $detailTextType;

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

    public function getWfStatusId(): ?int
    {
        return $this->wfStatusId;
    }

    public function setWfStatusId(int $wfStatusId): self
    {
        $this->wfStatusId = $wfStatusId;

        return $this;
    }

    public function getLockStatus(): ?string
    {
        return $this->lockStatus;
    }

    public function setLockStatus(string $lockStatus): self
    {
        $this->lockStatus = $lockStatus;

        return $this;
    }

    public function getWfDateLock(): ?\DateTimeImmutable
    {
        if ($this->wfDateLock) {
            return new \DateTimeImmutable(datetime: $this->wfDateLock);
        }

        return null;
    }

    public function setWfDateLock(string $wfDateLock): self
    {
        $this->wfDateLock = $wfDateLock;

        return $this;
    }

    public function getInSections(): ?bool
    {
        return $this->inSections;
    }

    public function setInSections(bool $inSections): self
    {
        $this->inSections = $inSections;

        return $this;
    }

    public function getShowCounterStart(): ?\DateTimeImmutable
    {
        if ($this->showCounterStart) {
            return new \DateTimeImmutable(datetime: $this->showCounterStart);
        }

        return null;
    }

    public function setShowCounterStart(string $showCounterStart): self
    {
        $this->showCounterStart = $showCounterStart;

        return $this;
    }

    public function getShowCounterStartX(): ?\DateTimeImmutable
    {
        if ($this->showCounterStartX) {
            return new \DateTimeImmutable(datetime: $this->showCounterStartX);
        }

        return null;
    }

    public function setShowCounterStartX(string $showCounterStartX): self
    {
        $this->showCounterStartX = $showCounterStartX;

        return $this;
    }

    public function getXmlId(): ?int
    {
        return $this->xmlId;
    }

    public function setXmlId(int $xmlId): self
    {
        $this->xmlId = $xmlId;

        return $this;
    }

    public function getExternalId(): ?int
    {
        return $this->externalId;
    }

    public function setExternalId(int $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getTmpId(): ?int
    {
        return $this->tmpId;
    }

    public function setTmpId(int $tmpId): self
    {
        $this->tmpId = $tmpId;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getCreatedUserName(): ?string
    {
        return $this->createdUserName;
    }

    public function setCreatedUserName(string $createdUserName): self
    {
        $this->createdUserName = $createdUserName;

        return $this;
    }

    public function getLangDir(): ?string
    {
        return $this->langDir;
    }

    public function setLangDir(string $langDir): self
    {
        $this->langDir = $langDir;

        return $this;
    }

    public function getLid(): ?string
    {
        return $this->lid;
    }

    public function setLid(string $lid): self
    {
        $this->lid = $lid;

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

    public function getIblockName(): ?string
    {
        return $this->iblockName;
    }

    public function setIblockName(string $iblockName): self
    {
        $this->iblockName = $iblockName;

        return $this;
    }

    public function getDetailPageUrl(): ?string
    {
        return $this->detailPageUrl;
    }

    public function setDetailPageUrl(string $detailPageUrl): self
    {
        $this->detailPageUrl = $detailPageUrl;

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

    public function getCreatedDate(): ?\DateTimeImmutable
    {
        if ($this->createdDate) {
            return \DateTimeImmutable::createFromFormat(format: 'Y.m.d', datetime: $this->createdDate);
        }

        return null;
    }

    public function setCreatedDate(string $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getBpPublished(): ?bool
    {
        return $this->bpPublished;
    }

    public function setBpPublished(bool $bpPublished): self
    {
        $this->bpPublished = $bpPublished;

        return $this;
    }
}