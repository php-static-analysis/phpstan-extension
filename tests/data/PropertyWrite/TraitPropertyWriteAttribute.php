<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\PropertyWrite;

use PhpStaticAnalysis\Attributes\PropertyWrite;

#[PropertyWrite(name: 'string')]
trait TraitPropertyWriteAttribute
{
}
