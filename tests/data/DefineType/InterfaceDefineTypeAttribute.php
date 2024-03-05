<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\DefineType;

use PhpStaticAnalysis\Attributes\DefineType;

#[DefineType(StringArray: 'string[]')]
interface InterfaceDefineTypeAttribute
{
}
