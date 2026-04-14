<?php

declare(strict_types=1);

namespace BxEmHydrator\Element\Handler;

use function BxEmHydrator\Handler\GetFileExtension;

readonly class Attachment
{
    public static function file(int $id): array
    {
        $fields = \CFile::GetByID(fileId: $id)->GetNext();
        $fields = Clr::fields(fields: $fields);
        $fields['EXTENSION'] = GetFileExtension(path: $fields['SRC']);

        return $fields;
    }

    public static function section(int $id): array
    {
        $fields = \CIBlockSection::GetByID(ID: $id)->GetNext();

        return Clr::fields(fields: $fields);
    }
}
