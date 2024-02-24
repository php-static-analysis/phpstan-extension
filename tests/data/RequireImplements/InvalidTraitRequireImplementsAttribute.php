<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\RequireImplements;

use PhpStaticAnalysis\Attributes\RequireImplements;

#[RequireImplements(0)]
trait InvalidTraitRequireImplementsAttribute2
{
}

#[RequireImplements('+5')]
trait InvalidTraitRequireImplementsAttribute
{
    #[RequireImplements('InvalidInterfaceRequireImplementsAttribute')]
    public string $name = '';
}

interface InvalidInterfaceRequireImplementsAttribute
{
}

class InvalidClassRequireImplementsAttribute implements InvalidInterfaceRequireImplementsAttribute
{
    use InvalidTraitRequireImplementsAttribute;
}
