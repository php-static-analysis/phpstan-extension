<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Impure;

$i = 0;

#[Impure]
function add(int $left): int
{
    global $i;
    
    $i += $left;
    return $i;
}
