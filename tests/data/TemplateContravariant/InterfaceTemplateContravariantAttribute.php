<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateContravariant;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\TemplateContravariant;

#[TemplateContravariant('T')]
interface InterfaceTemplateContravariantAttribute
{
    #[Param(param: 'T')]
    public function returnTemplateContravariant($param): void;
}
