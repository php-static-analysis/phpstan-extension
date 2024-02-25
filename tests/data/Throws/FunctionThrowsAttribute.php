<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Throws;

use Exception;
use PhpStaticAnalysis\Attributes\Throws;

#[Throws(Exception::class)]
function countName(string $name): int
{
    if ($name == '') {
        throw new Exception('Empty string!');
    }
    return strlen($name);
}
