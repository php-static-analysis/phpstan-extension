<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Pure;

#[Pure]
function add(int $left, int $right): int
{
    return $left + $right;
}
