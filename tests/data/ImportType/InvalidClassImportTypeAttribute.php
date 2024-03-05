<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\ImportType;

use PhpStaticAnalysis\Attributes\DefineType;
use PhpStaticAnalysis\Attributes\ImportType;

#[ImportType(0)]
#[ImportType('string')]
#[ImportType(name: 'count($a)')]
class InvalidClassImportTypeAttribute
{
    #[ImportType(StringArray: StringClass::class)]
    public function getName(): string
    {
        return "John";
    }
}

#[DefineType(StringArray: 'string[]')]
class StringClass
{
}
