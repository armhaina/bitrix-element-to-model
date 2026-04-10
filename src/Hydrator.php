<?php

declare(strict_types=1);

namespace BitrixElementHydrator;

use BitrixElementHydrator\Attribute\HydratorDataTypeInArray;
use BitrixElementHydrator\Contract\HydratorEntityAttachmentInterface;
use BitrixElementHydrator\Contract\HydratorEntityInterface;
use BitrixElementHydrator\Contract\HydratorEntityPropertyInterface;
use BitrixElementHydrator\Exception\HydratorAttributeNotFoundException;
use BitrixElementHydrator\Handler\Attachment;
use BitrixElementHydrator\Handler\Clr;
use BitrixElementHydrator\Handler\Rfl;
use BitrixElementHydrator\Handler\Rule;
use BitrixElementHydrator\Handler\Str;
use BitrixElementHydrator\Handler\Validation;
use BitrixElementHydrator\Model\Configure;
use BitrixElementHydrator\Model\Entity\Attachment\HydratorFileAttachment;
use BitrixElementHydrator\Model\Entity\Attachment\HydratorSectionAttachment;
use DateMalformedStringException;
use ReflectionException;

class Hydrator
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

            $configure = new Configure()
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

            $configure = self::configure(configure: $configure, model: $model);

            match ($configure->getDataType()) {
                'int' => $model->{$method}(self::int(configure: $configure)),
                'string' => $model->{$method}(self::string(configure: $configure)),
                'bool' => $model->{$method}(self::bool(configure: $configure)),
                'enum' => $model->{$method}(self::enum(configure: $configure)),
                'attachment' => $model->{$method}(self::attachment(configure: $configure)),
                'array' => $model->{$method}(self::array(configure: $configure)),
                'property' => $model->{$method}(self::property(configure: $configure)),
                'entity' => $model->{$method}(self::entity(configure: $configure)),
            };
        }

        return $model;
    }

    /**
     * @throws ReflectionException
     */
    private static function configure(Configure $configure, object $model): Configure
    {
        if ($configure->getDataType() === 'array') {
            $attribute = Rfl::attribute(
                attributeName: HydratorDataTypeInArray::class,
                className: $model::class,
                property: Str::snakeToCamelCase(string: $configure->getField())
            );

            if (!$attribute) {
                throw new HydratorAttributeNotFoundException(attribute: HydratorDataTypeInArray::class);
            }

            $configure->setDataTypeInArray(dataTypeInArray: $attribute->getTypeOrClassName());
        }

        if (class_exists(class: $configure->getDataType())) {
            if (enum_exists(enum: $configure->getDataType())) {
                $configure
                    ->setClassName(className: $configure->getDataType())
                    ->setDataType(dataType: 'enum');
            }
            if (is_subclass_of(object_or_class: $configure->getDataType(), class: HydratorEntityInterface::class)) {
                $configure
                    ->setClassName(className: $configure->getDataType())
                    ->setDataType(dataType: 'entity');
            }
            if (is_subclass_of(object_or_class: $configure->getDataType(), class: HydratorEntityPropertyInterface::class)) {
                $configure
                    ->setClassName(className: $configure->getDataType())
                    ->setDataType(dataType: 'property')
                    ->setFieldRoot(fieldRoot: $configure->getField());
            }
            if (is_subclass_of(object_or_class: $configure->getDataType(), class: HydratorEntityAttachmentInterface::class)) {
                $configure
                    ->setClassName(className: $configure->getDataType())
                    ->setDataType(dataType: 'attachment')
                    ->setFieldRoot(fieldRoot: $configure->getField());
            }
        }

        return $configure;
    }

    private static function int(Configure $configure): int
    {
        return (int)$configure->getValue();
    }

    private static function string(Configure $configure): string
    {
        return $configure->getValue();
    }

    private static function bool(Configure $configure): bool
    {
        return in_array(needle: $configure->getValue(), haystack: ['Y', '1']);
    }

    private static function enum(Configure $configure): \BackedEnum
    {
        return $configure->getClassName()::from($configure->getValue());
    }

    /**
     * @throws DateMalformedStringException
     * @throws ReflectionException
     */
    private static function attachment(Configure $configure): object
    {
        $className = $configure->getClassName();
        $class = new $className;

        if ($class instanceof HydratorFileAttachment) {
            $fields = ['ID' => $configure->getValue()];

            if (Rule::dataRelated(configure: $configure)) {
                $fields = Attachment::file(id: (int)$configure->getValue());
            }

            self::handler(fields: $fields, model: $class, rules: $configure->getRules());
        }

        if ($class instanceof HydratorSectionAttachment) {
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
    private static function array(Configure $configure): array
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
     * @throws ReflectionException
     * @throws DateMalformedStringException
     */
    private static function property(Configure $configure): object
    {
        $className = $configure->getClassName();
        $class = new $className;

        self::handler(
            fields: $configure->getValue(),
            model: $class,
            rules: $configure->getRules(),
            fieldRoot: $configure->getFieldRoot(),
            classNameRoot: $configure->getClassNameRoot()
        );

        return $class;
    }

    /**
     * @throws DateMalformedStringException
     * @throws ReflectionException
     */
    private static function entity(Configure $configure): object
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
