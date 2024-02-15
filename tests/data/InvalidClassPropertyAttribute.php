<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Property;

#[Property(0)]
#[Property('string')]
#[Property(name: 'count($a)')]
class InvalidClassPropertyAttribute
{
    #[Property('string')]
    public function getNane(): string
    {
        return "John";
    }
}
