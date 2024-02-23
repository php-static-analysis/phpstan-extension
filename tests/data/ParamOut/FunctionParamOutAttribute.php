<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\ParamOut;

use PhpStaticAnalysis\Attributes\ParamOut;

#[ParamOut(names: 'int')]
function setNames(mixed &$names): void
{
    $names = 1;
}
