<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateCovariant;

use PhpStaticAnalysis\Attributes\TemplateCovariant;

#[TemplateCovariant(0)]
#[TemplateCovariant('+5')]
#[TemplateCovariant('T', 0)]
class InvalidClassTemplateCovariantAttribute
{
    #[TemplateCovariant('T')]
    public string $property;
}
