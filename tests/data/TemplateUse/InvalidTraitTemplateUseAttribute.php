<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateUse;

use PhpStaticAnalysis\Attributes\Template;
use PhpStaticAnalysis\Attributes\TemplateUse;

#[Template('T')]
trait InvalidTraitTemplateUseAttribute
{
}

#[TemplateUse(0)]
class InvalidClassTemplateUseAttribute
{
    use InvalidTraitTemplateUseAttribute;
}

#[TemplateUse('+5')]
class InvalidClassTemplateUseAttribute2
{
    use InvalidTraitTemplateUseAttribute;

    #[TemplateUse('InvalidTraitTemplateUseAttribute<int>')]
    public string $name = '';
}
