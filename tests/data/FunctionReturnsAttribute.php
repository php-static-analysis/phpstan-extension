<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Returns;

#[Returns('string[]')]
function getNames(): array
{
    return ['hello', 'world'];
}
