<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Template;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\Template;

#[Template('T')]
trait TraitTemplateAttribute
{
    #[Param(param: 'T')]
    #[Returns('T')]
    public function returnTemplate($param)
    {
        return $param;
    }
}
