<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\DefineType;

use PhpStaticAnalysis\Attributes\DefineType;

#[DefineType(0)]
#[DefineType('string')]
#[DefineType(name: 'count($a)')]
class InvalidClassDefineTypeAttribute
{
    #[DefineType('StringArray string[]')]
    public function getName(): string
    {
        return "John";
    }
}
