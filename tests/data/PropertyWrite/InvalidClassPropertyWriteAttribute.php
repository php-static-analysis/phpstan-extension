<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\PropertyWrite;

use PhpStaticAnalysis\Attributes\PropertyWrite;

#[PropertyWrite(0)]
#[PropertyWrite('string')]
#[PropertyWrite(name: 'count($a)')]
#[PropertyWrite(age: 'int')]
class InvalidClassPropertyWriteAttribute
{
    #[PropertyWrite('string')]
    public function getName(): string
    {
        return "John";
    }
}

$class = new ClassPropertyWriteAttribute();
$foo = $class->age;
