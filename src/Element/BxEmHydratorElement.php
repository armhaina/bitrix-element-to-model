<?php

declare(strict_types=1);

namespace BxEmHydrator\Element;

use BxEmHydrator\Element\Attribute\BxEmHydratorDataTypeInArray;
use BxEmHydrator\Element\Contract\BxEmHydratorEntityAttachmentInterface;
use BxEmHydrator\Element\Contract\BxEmHydratorEntityInterface;
use BxEmHydrator\Element\Exception\BxEmHydratorAttributeNotFoundException;
use BxEmHydrator\Element\Handler\Attachment;
use BxEmHydrator\Element\Handler\Clr;
use BxEmHydrator\Element\Handler\Rfl;
use BxEmHydrator\Element\Handler\Rule;
use BxEmHydrator\Element\Handler\Str;
use BxEmHydrator\Element\Handler\Validation;
use BxEmHydrator\Element\Model\BxEmHydratorConfigure;
use BxEmHydrator\Element\Model\Entity\Attachment\BxEmHydratorFileAttachment;
use BxEmHydrator\Element\Model\Entity\Attachment\BxEmHydratorSectionAttachment;
use DateMalformedStringException;
use ReflectionException;

class BxEmHydratorElement
{
    /**
     * @throws ReflectionException
     * @throws DateMalformedStringException
     */
    public static function exec(\_CIBElement $item, string $className, array $rules = []): object
    {
        Validation::rules(rules: $rules);

        $model = new $className;

        $fields = $item->getFields();
        $fields = Clr::fields(fields: $fields);

        $properties = $item->GetProperties();
        $properties = Clr::properties(properties: $properties, fields: $fields);

        self::handler(
            fields: array_merge($fields, $properties),
            model: $model,
            rules: $rules,
            classNameRoot: $model::class
        );

        return $model;
    }

    /**
     * @throws DateMalformedStringException
     * @throws ReflectionException
     */
    private static function handler(
        array $fields,
        object $model,
        array $rules = [],
        ?string $fieldRoot = null,
        ?string $classNameRoot = null
    ): object {
        foreach ($fields as $field => $value) {
            $method = 'set' . Str::snakeToPascalCase(string: $field);

            if (!method_exists(object_or_class: $model, method: $method)) {
                continue;
            }

            $configure = new BxEmHydratorConfigure()
                ->setValue(value: $value)
                ->setField(field: $field)
                ->setRules(rules: $rules)
                ->setDataType(dataType: Rfl::type(model: $model, method: $method));

            if ($fieldRoot) {
                $configure->setFieldRoot(fieldRoot: $fieldRoot);
            }

            if ($classNameRoot) {
                $configure->setClassNameRoot(classNameRoot: $classNameRoot);
            }

            // Если поля является свойством (PROPERTY_) битрикса, то берем только value
            if (!empty($configure->getValue()['PROPERTY_VALUE_ID'])) {
                $configure->setValue(value: $configure->getValue()['VALUE']);
            }

            $configure = self::configure(configure: $configure, model: $model);

            match ($configure->getDataType()) {
                'int' => $model->{$method}(self::int(configure: $configure)),
                'string' => $model->{$method}(self::string(configure: $configure)),
                'bool' => $model->{$method}(self::bool(configure: $configure)),
                'enum' => $model->{$method}(self::enum(configure: $configure)),
                'attachment' => $model->{$method}(self::attachment(configure: $configure)),
                'array' => $model->{$method}(self::array(configure: $configure)),
                'entity' => $model->{$method}(self::entity(configure: $configure)),
            };
        }

        return $model;
    }

    /**
     * @throws ReflectionException
     */
    private static function configure(BxEmHydratorConfigure $configure, object $model): BxEmHydratorConfigure
    {
        if ($configure->getDataType() === 'array') {
            $attribute = Rfl::attribute(
                attributeName: BxEmHydratorDataTypeInArray::class,
                className: $model::class,
                property: Str::snakeToCamelCase(string: $configure->getField())
            );

            if (!$attribute) {
                throw new BxEmHydratorAttributeNotFoundException(attribute: BxEmHydratorDataTypeInArray::class);
            }

            $configure->setDataTypeInArray(dataTypeInArray: $attribute->getTypeOrClassName());
        }

        if (class_exists(class: $configure->getDataType())) {
            if (enum_exists(enum: $configure->getDataType())) {
                $configure
                    ->setClassName(className: $configure->getDataType())
                    ->setDataType(dataType: 'enum');
            }
            if (is_subclass_of(object_or_class: $configure->getDataType(), class: BxEmHydratorEntityInterface::class)) {
                $configure
                    ->setClassName(className: $configure->getDataType())
                    ->setDataType(dataType: 'entity');
            }
            if (is_subclass_of(
                object_or_class: $configure->getDataType(),
                class: BxEmHydratorEntityAttachmentInterface::class
            )) {
                $configure
                    ->setClassName(className: $configure->getDataType())
                    ->setDataType(dataType: 'attachment')
                    ->setFieldRoot(fieldRoot: $configure->getField());
            }
        }

        return $configure;
    }

    private static function int(BxEmHydratorConfigure $configure): int
    {
        return (int)$configure->getValue();
    }

    private static function string(BxEmHydratorConfigure $configure): string
    {
        return $configure->getValue();
    }

    private static function bool(BxEmHydratorConfigure $configure): bool
    {
        return in_array(needle: $configure->getValue(), haystack: ['Y', '1']);
    }

    private static function enum(BxEmHydratorConfigure $configure): \BackedEnum
    {
        return $configure->getClassName()::from($configure->getValue());
    }

    /**
     * @throws DateMalformedStringException
     * @throws ReflectionException
     */
    private static function attachment(BxEmHydratorConfigure $configure): object
    {
        $className = $configure->getClassName();
        $class = new $className;

        if ($class instanceof BxEmHydratorFileAttachment) {
            $fields = ['ID' => $configure->getValue()];

            if (Rule::dataRelated(configure: $configure)) {
                $fields = Attachment::file(id: (int)$configure->getValue());
            }

            self::handler(fields: $fields, model: $class, rules: $configure->getRules());
        }

        if ($class instanceof BxEmHydratorSectionAttachment) {
            $fields = ['ID' => $configure->getValue()];

            if (Rule::dataRelated(configure: $configure)) {
                $fields = Attachment::section(id: (int)$configure->getValue());
            }

            self::handler(
                fields: $fields,
                model: $class,
                rules: $configure->getRules(),
                classNameRoot: $configure->getClassNameRoot()
            );
        }

        return $class;
    }

    /**
     * @throws DateMalformedStringException
     * @throws ReflectionException
     */
    private static function array(BxEmHydratorConfigure $configure): array
    {
        $values = $configure->getValue();
        $dataTypeInArray = $configure->getDataTypeInArray();

        if ($dataTypeInArray === 'string') {
            $values = array_map(
                fn(string $item): string => (string)$item,
                $configure->getValue(),
            );
        }

        if ($dataTypeInArray === 'integer') {
            $values = array_map(
                fn(string $item): int => (int)$item,
                $configure->getValue(),
            );
        }

        if ($dataTypeInArray === 'float') {
            $values = array_map(
                fn(string $item): float => (float)$item,
                $configure->getValue(),
            );
        }

        if (class_exists(class: $dataTypeInArray)) {
            $values = [];

            if (enum_exists(enum: $dataTypeInArray)) {
                foreach ($configure->getValue() as $value) {
                    $values[] = $configure->getDataTypeInArray()::from($value);
                }
            } else {
                if (Rule::dataRelated(configure: $configure)) {
                    foreach ($configure->getValue() as $value) {
                        $item = \CIBlockElement::GetByID(ID: $value)->GetNextElement();
                        $values[] = self::exec(
                            item: $item,
                            className: $configure->getDataTypeInArray(),
                            rules: $configure->getRules()
                        );
                    }
                } else {
                    foreach ($configure->getValue() as $value) {
                        $item = ['ID' => $value];
                        $class = $configure->getDataTypeInArray();
                        $values[] = self::handler(fields: $item, model: new $class, rules: $configure->getRules());
                    }
                }
            }
        }

        return $values;
    }

    /**
     * @throws DateMalformedStringException
     * @throws ReflectionException
     */
    private static function entity(BxEmHydratorConfigure $configure): object
    {
        if (Rule::dataRelated(configure: $configure)) {
            $item = \CIBlockElement::GetByID(ID: $configure->getValue())->GetNextElement();

            return self::exec(item: $item, className: $configure->getClassName(), rules: $configure->getRules());
        } else {
            $item = ['ID' => $configure->getValue()];
            $class = $configure->getClassName();

            return self::handler(fields: $item, model: new $class, rules: $configure->getRules());
        }
    }
}
