<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Property;

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

    public function __set(string $name, mixed $value)
    {
        $this->$name = $value;
    }
}

$class = new ClassPropertyAttribute();
$foo = $class->name;
$class->age = 7;
$indexes = $class->index1 + $class->index2;
