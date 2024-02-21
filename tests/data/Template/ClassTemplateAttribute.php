<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Template;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\Template;

#[Template('T')] // the type used in the class
class ClassTemplateAttribute
{
    #[Param(param: 'T')]
    #[Returns('T')]
    public function returnTemplate($param)
    {
        return $param;
    }
}
