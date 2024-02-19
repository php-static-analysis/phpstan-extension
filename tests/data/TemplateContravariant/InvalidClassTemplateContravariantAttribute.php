<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateContravariant;

use PhpStaticAnalysis\Attributes\TemplateContravariant;

#[TemplateContravariant(0)]
#[TemplateContravariant('+5')]
#[TemplateContravariant('T', 0)]
class InvalidClassTemplateContravariantAttribute
{
    #[TemplateContravariant('T')]
    public string $property;
}
