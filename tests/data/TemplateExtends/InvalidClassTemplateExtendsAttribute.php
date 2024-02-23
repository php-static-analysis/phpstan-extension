<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateExtends;

use PhpStaticAnalysis\Attributes\Template;
use PhpStaticAnalysis\Attributes\TemplateExtends;

#[Template('T')]
class InvalidClassTemplateExtendsAttribute
{
}

#[TemplateExtends(0)]
class InvalidClassTemplateExtendsAttributeChild extends InvalidClassTemplateExtendsAttribute
{
}

#[TemplateExtends('+5')]
class InvalidClassTemplateExtendsAttributeChild2 extends InvalidClassTemplateExtendsAttribute
{
}

#[TemplateExtends('InvalidClassTemplateExtendsAttribute<int>')]
#[TemplateExtends('InvalidClassTemplateExtendsAttribute<int>')]
class InvalidClassTemplateExtendsAttributeChild3 extends InvalidClassTemplateExtendsAttribute
{
    #[TemplateExtends('InvalidClassTemplateExtendsAttribute<int>')]
    public string $name = '';
}
