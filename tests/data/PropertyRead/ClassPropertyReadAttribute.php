<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\PropertyRead;

use PhpStaticAnalysis\Attributes\PropertyRead;

#[PropertyRead(name: 'string')] // cannot be written to
#[PropertyRead('int $age')]
#[PropertyRead(
    index1: 'string[]',
    index2: 'string[]',
)]
class ClassPropertyReadAttribute
{
    public function __get(string $name): mixed
    {
        return $name;
    }
}

$class = new ClassPropertyReadAttribute();
$foo = $class->name;
$bar = $class->age;
$indexes = $class->index1 + $class->index2;
