<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\PropertyWrite;

use PhpStaticAnalysis\Attributes\PropertyWrite;

#[PropertyWrite(name: 'string')] // cannot be read
#[PropertyWrite('int $age')]
#[PropertyWrite(
    index1: 'string[]',
    index2: 'string[]',
)]
class ClassPropertyWriteAttribute
{
    public function __set(string $name, mixed $value)
    {
        $this->$name = $value;
    }
}

$class = new ClassPropertyWriteAttribute();
$class->name = 'John';
$class->age = 7;
$class->index1 = [];
$class->index2 = [];
