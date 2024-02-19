<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateCovariant;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\TemplateCovariant;

#[TemplateCovariant('T')]
trait TraitTemplateCovariantAttribute
{
    #[Param(param: 'T')]
    #[Returns('T')]
    public function returnTemplateCovariant($param)
    {
        return $param;
    }
}
