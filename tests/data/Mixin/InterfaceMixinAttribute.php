<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Mixin;

use PhpStaticAnalysis\Attributes\Mixin;

#[Mixin('AClass')]
interface InterfaceMixinAttribute
{
}

class AClass
{
}
