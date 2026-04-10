<?php

declare(strict_types=1);

namespace BitrixElementHydrator\Model\Entity\Property;

use BitrixElementHydrator\Contract\BxEmHydratorEntityPropertyInterface;

abstract class AbstractBxEmBxEmHydratorProperty implements BxEmHydratorEntityPropertyInterface
{
    protected int $id;
    protected string $timestampX;
    protected int $iblockId;
    protected string $name;
    protected bool $active;
    protected int $sort;
    protected string $code;
    protected string $propertyType;
    protected int $rowCount;
    protected int $cowCount;
    protected string $listType;
    protected bool $multiple;
    protected int $multipleCnt;
    protected int $linkIblockId;
    protected bool $withDescription;
    protected bool $searchable;
    protected bool $filtrable;
    protected bool $isRequired;
    protected int $version;
    protected ?string $hint = null;
    protected ?string $userType = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTimestampX(): \DateTimeImmutable
    {
        return new \DateTimeImmutable(datetime: $this->timestampX);
    }

    public function setTimestampX(string $timestampX): self
    {
        $this->timestampX = $timestampX;

        return $this;
    }

    public function getIblockId(): int
    {
        return $this->iblockId;
    }

    public function setIblockId(int $iblockId): self
    {
        $this->iblockId = $iblockId;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getPropertyType(): string
    {
        return $this->propertyType;
    }

    public function setPropertyType(string $propertyType): self
    {
        $this->propertyType = $propertyType;

        return $this;
    }

    public function getRowCount(): int
    {
        return $this->rowCount;
    }

    public function setRowCount(int $rowCount): self
    {
        $this->rowCount = $rowCount;

        return $this;
    }

    public function getCowCount(): int
    {
        return $this->cowCount;
    }

    public function setCowCount(int $cowCount): self
    {
        $this->cowCount = $cowCount;

        return $this;
    }

    public function getListType(): string
    {
        return $this->listType;
    }

    public function setListType(string $listType): self
    {
        $this->listType = $listType;

        return $this;
    }

    public function getMultipleCnt(): int
    {
        return $this->multipleCnt;
    }

    public function setMultipleCnt(int $multipleCnt): self
    {
        $this->multipleCnt = $multipleCnt;

        return $this;
    }

    public function getMultiple(): bool
    {
        return $this->multiple;
    }

    public function setMultiple(bool $multiple): self
    {
        $this->multiple = $multiple;

        return $this;
    }

    public function getLinkIblockId(): int
    {
        return $this->linkIblockId;
    }

    public function setLinkIblockId(int $linkIblockId): self
    {
        $this->linkIblockId = $linkIblockId;

        return $this;
    }

    public function getWithDescription(): bool
    {
        return $this->withDescription;
    }

    public function setWithDescription(bool $withDescription): self
    {
        $this->withDescription = $withDescription;

        return $this;
    }

    public function getSearchable(): bool
    {
        return $this->searchable;
    }

    public function setSearchable(bool $searchable): self
    {
        $this->searchable = $searchable;

        return $this;
    }

    public function getFiltrable(): bool
    {
        return $this->filtrable;
    }

    public function setFiltrable(bool $filtrable): self
    {
        $this->filtrable = $filtrable;

        return $this;
    }

    public function getIsRequired(): bool
    {
        return $this->isRequired;
    }

    public function setIsRequired(bool $isRequired): self
    {
        $this->isRequired = $isRequired;

        return $this;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getHint(): ?string
    {
        return $this->hint;
    }

    public function setHint(string $hint): self
    {
        $this->hint = $hint;

        return $this;
    }

    public function getUserType(): ?string
    {
        return $this->userType;
    }

    public function setUserType(string $userType): self
    {
        $this->userType = $userType;

        return $this;
    }
}
