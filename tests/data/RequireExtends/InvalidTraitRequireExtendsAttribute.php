<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\RequireExtends;

use PhpStaticAnalysis\Attributes\RequireExtends;

#[RequireExtends(0)]
trait InvalidTraitRequireExtendsAttribute2
{
}

#[RequireExtends('+5')]
trait InvalidTraitRequireExtendsAttributeChild3
{
}

#[RequireExtends('InvalidClassRequireExtendsAttribute')]
#[RequireExtends('InvalidClassRequireExtendsAttribute')]
trait InvalidTraitRequireExtendsAttribute
{
    #[RequireExtends('InvalidClassRequireExtendsAttribute')]
    public string $name = '';
}

class InvalidClassRequireExtendsAttribute
{
}

class InvalidClassRequireExtendsAttributeChild extends InvalidClassRequireExtendsAttribute
{
    use InvalidTraitRequireExtendsAttribute;
}
