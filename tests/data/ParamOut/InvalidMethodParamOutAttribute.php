<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\ParamOut;

use PhpStaticAnalysis\Attributes\ParamOut;

class InvalidMethodParamOutAttribute
{
    #[ParamOut(0)]
    public function setName(mixed &$name): void
    {
        $name = 1;
    }

    #[ParamOut('string')]
    public function setOtherName(mixed &$name): void
    {
        $name = 1;
    }

    #[ParamOut(name: 'count($a)')]
    public function setAnotherName(mixed &$name): void
    {
        $name = 1;
    }

    #[ParamOut(property: 'string')]
    public string $property;
}
