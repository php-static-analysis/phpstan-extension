<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\AssertIfFalse;

use Exception;
use PhpStaticAnalysis\Attributes\AssertIfFalse;

#[AssertIfFalse(name: 'string')]
function checkString(mixed $name): bool
{
    return !is_string($name);
}
