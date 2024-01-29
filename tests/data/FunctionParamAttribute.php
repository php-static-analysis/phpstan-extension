<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Param;

#[Param(names: 'string[]')]
function countNames(array $names): int
{
    return count($names);
}
