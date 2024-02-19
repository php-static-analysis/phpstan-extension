<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\PropertyRead;

use PhpStaticAnalysis\Attributes\PropertyRead;

#[PropertyRead(name: 'string')]
interface InterfacePropertyReadAttribute
{
}
