<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Property;

#[Property(name: 'string')]
#[Property('int $age')]
#[Property(
    index1: 'string[]',
    index2: 'string[]',
)]
class ClassPropertyAttribute
{
    #[Property('int[]')]
    public array $nums;

    public function __get(string $name): mixed
    {
        return $name;
    }
}

$class = new ClassPropertyAttribute();
$foo = $class->name;
$bar = $class->age;
$indexes = $class->index1 + $class->index2;
