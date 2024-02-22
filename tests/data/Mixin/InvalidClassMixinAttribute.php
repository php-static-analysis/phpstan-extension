<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Mixin;

use PhpStaticAnalysis\Attributes\Mixin;

#[Mixin(0)]
#[Mixin('count($a)')]
class InvalidClassMixinAttribute
{
    #[Mixin('A')]
    public function getName(): string
    {
        return "John";
    }
}
