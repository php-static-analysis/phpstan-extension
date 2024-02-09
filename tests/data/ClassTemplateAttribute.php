<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\Template;

#[Template('T')]
class ClassTemplateAttribute
{
    #[Param(param: 'T')]
    #[Returns('T')]
    public function returnTemplate($param)
    {
        return $param;
    }
}
