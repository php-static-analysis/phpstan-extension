<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateUse;

use PhpStaticAnalysis\Attributes\Template;
use PhpStaticAnalysis\Attributes\TemplateUse;

#[Template('T')]
trait TraitTemplateUseAttribute
{
}

#[Template('T')]
trait TraitTemplateUseAttribute2
{
}

#[Template('T')]
trait TraitTemplateUseAttribute3
{
}

#[TemplateUse('TraitTemplateUseAttribute<int>')] // this class uses the base trait
#[TemplateUse(
    'TraitTemplateUseAttribute2<int>',
    'TraitTemplateUseAttribute3<int>'
)]
class ClassTemplateUseAttribute
{
    use TraitTemplateUseAttribute;
    use TraitTemplateUseAttribute2, TraitTemplateUseAttribute3;
}
