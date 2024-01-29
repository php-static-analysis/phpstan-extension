<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\Template;

class InvalidMethodTemplateAttribute
{
    #[Template(0)]
    public function getName(): string
    {
        return 'Mike';
    }

    #[Template('+5')]
    public function getAnotherName(): string
    {
        return 'John';
    }

    #[Template('T')]
    public string $property;

    #[Template('T', 0)]
    #[Param(param: 'T')]
    #[Returns('T')]
    public function getMoreName($param)
    {
        return $param;
    }
}
