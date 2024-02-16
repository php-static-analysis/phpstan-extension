<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Template;

use Exception;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\Template;

class MethodTemplateAttribute
{
    #[Template('T')]
    #[Param(param: 'T')]
    #[Returns('T')]
    public function returnTemplate($param)
    {
        return $param;
    }

    #[Template('T', Exception::class)]
    #[Param(param: 'T')]
    #[Returns('T')]
    public function returnTemplateOfException($param)
    {
        return $param;
    }

    /**
     * @deprecated
     */
    #[Template('T')]
    #[Param(param: 'T')]
    #[Returns('T')]
    public function returnAnotherTemplate($param)
    {
        return $param;
    }

    /**
     * @template T1
     * @param T1 $param1
     */
    #[Template('T2')]
    #[Param(param2: 'T2')]
    #[Returns('T1')]
    public function returnOneOfTheTemplates($param1, $param2)
    {
        return $param1;
    }

    #[Template('T1')]
    #[Template('T2')]
    #[Param(param1: 'T1', param2: 'T2')]
    #[Returns('T1')]
    public function moreReturnOneOfTheTemplates($param1, $param2)
    {
        return $param1;
    }

    /**
     * @template T
     * @param T $param
     * @return T
     */
    public function returnMoreTemplates($param)
    {
        return $param;
    }
}
