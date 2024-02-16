<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\PropertyRead;

use PhpStaticAnalysis\Attributes\PropertyRead;

#[PropertyRead(0)]
#[PropertyRead('string')]
#[PropertyRead(name: 'count($a)')]
#[PropertyRead(age: 'int')]
class InvalidClassPropertyReadAttribute
{
    #[PropertyRead('string')]
    public function getName(): string
    {
        return "John";
    }
}

$class = new ClassPropertyReadAttribute();
$class->age = 7;
