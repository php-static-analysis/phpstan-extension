<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateContravariant;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\TemplateContravariant;

#[TemplateContravariant('T')]
trait TraitTemplateContravariantContravariantAttribute
{
    #[Param(param: 'T')]
    #[Returns('T')]
    public function returnTemplateContravariant($param)
    {
        return $param;
    }
}
