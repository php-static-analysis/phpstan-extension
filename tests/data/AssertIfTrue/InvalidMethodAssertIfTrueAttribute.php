<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\AssertIfTrue;

use PhpStaticAnalysis\Attributes\AssertIfTrue;

class InvalidMethodAssertIfTrueAttribute
{
    #[AssertIfTrue(0)]
    public function checkString(mixed $name): bool
    {
        return true;
    }

    #[AssertIfTrue(property: 'string')]
    public string $property;
}
