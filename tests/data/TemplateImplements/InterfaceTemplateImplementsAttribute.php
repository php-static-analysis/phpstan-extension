<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateImplements;

use PhpStaticAnalysis\Attributes\Template;
use PhpStaticAnalysis\Attributes\TemplateImplements;

#[Template('T')]
interface InterfaceTemplateImplementsAttribute
{
}

#[Template('T')]
interface InterfaceTemplateImplementsAttribute2
{
}

#[Template('T')]
interface InterfaceTemplateImplementsAttribute3
{
}

#[TemplateImplements('InterfaceTemplateImplementsAttribute<int>')] // this class implements the base interface
#[TemplateImplements(
    'InterfaceTemplateImplementsAttribute2<int>',
    'InterfaceTemplateImplementsAttribute3<int>'
)]
class ClassTemplateImplementsAttribute implements InterfaceTemplateImplementsAttribute, InterfaceTemplateImplementsAttribute2, InterfaceTemplateImplementsAttribute3
{
}
