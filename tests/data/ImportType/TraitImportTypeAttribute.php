<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\ImportType;

use PhpStaticAnalysis\Attributes\DefineType;
use PhpStaticAnalysis\Attributes\ImportType;

#[ImportType(StringArray: StringClass::class)]
trait TraitImportTypeAttribute
{
}

#[DefineType(StringArray: 'string[]')]
class StringClass
{
}
