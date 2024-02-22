<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Mixin;

use PhpStaticAnalysis\Attributes\Mixin;

class Other
{
}

#[Mixin('Other')]
trait TraitMixinAttribute
{
}
