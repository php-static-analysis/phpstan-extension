<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateImplements;

use PhpStaticAnalysis\Attributes\Template;
use PhpStaticAnalysis\Attributes\TemplateImplements;

#[Template('T')]
interface InvalidInterfaceTemplateImplementsAttribute
{
}

#[TemplateImplements(0)]
class InvalidClassTemplateImplementsAttribute implements InvalidInterfaceTemplateImplementsAttribute
{
}

#[TemplateImplements('+5')]
class InvalidClassTemplateImplementsAttribute2 implements InvalidInterfaceTemplateImplementsAttribute
{
    #[TemplateImplements('InvalidInterfaceTemplateImplementsAttribute<int>')]
    public string $name = '';
}
