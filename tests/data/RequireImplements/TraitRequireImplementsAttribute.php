<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\RequireImplements;

use PhpStaticAnalysis\Attributes\RequireImplements;

#[RequireImplements('InterfaceRequireImplementsAttribute')] // the class that uses this trait needs to implement these interfaces
#[RequireImplements(
    'InterfaceRequireImplementsAttribute2',
    'InterfaceRequireImplementsAttribute3'
)]
trait TraitRequireImplementsAttribute
{
}

interface InterfaceRequireImplementsAttribute
{
}

interface InterfaceRequireImplementsAttribute2
{
}

interface InterfaceRequireImplementsAttribute3
{
}

class ClassRequireImplementsAttribute implements InterfaceRequireImplementsAttribute, InterfaceRequireImplementsAttribute2, InterfaceRequireImplementsAttribute3
{
    use TraitRequireImplementsAttribute;
}

class ClassRequireImplementsAttribute2 implements InterfaceRequireImplementsAttribute, InterfaceRequireImplementsAttribute2
{
    use TraitRequireImplementsAttribute;
}
