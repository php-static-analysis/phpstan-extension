<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\AssertIfTrue;

use Exception;
use PhpStaticAnalysis\Attributes\AssertIfTrue;

#[AssertIfTrue(name: 'string')]
function checkString(mixed $name): bool
{
    return is_string($name);
}
