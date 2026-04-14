<?php

declare(strict_types=1);

namespace BxEmHydrator\Model;

class BxEmHydratorConfigure
{
    private string $field;
    private string|array $value;
    private string $dataType;
    private array $rules;
    private ?string $fieldRoot;
    private ?string $className = null;
    private ?string $classNameRoot = null;
    private ?string $dataTypeInArray = null;

    public function getValue(): string|array
    {
        return $this->value;
    }

    public function setValue(string|array $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function setField(string $field): self
    {
        $this->field = $field;

        return $this;
    }

    public function getDataType(): string
    {
        return $this->dataType;
    }

    public function setDataType(string $dataType): self
    {
        $this->dataType = $dataType;

        return $this;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function setRules(array $rules): self
    {
        $this->rules = $rules;

        return $this;
    }

    public function getFieldRoot(): ?string
    {
        return $this->fieldRoot;
    }

    public function setFieldRoot(string $fieldRoot): self
    {
        $this->fieldRoot = $fieldRoot;

        return $this;
    }

    public function getClassName(): ?string
    {
        return $this->className;
    }

    public function setClassName(string $className): self
    {
        $this->className = $className;

        return $this;
    }

    public function getClassNameRoot(): ?string
    {
        return $this->classNameRoot;
    }

    public function setClassNameRoot(string $classNameRoot): self
    {
        $this->classNameRoot = $classNameRoot;

        return $this;
    }

    public function getDataTypeInArray(): ?string
    {
        return $this->dataTypeInArray;
    }

    public function setDataTypeInArray(string $dataTypeInArray): self
    {
        $this->dataTypeInArray = $dataTypeInArray;

        return $this;
    }
}