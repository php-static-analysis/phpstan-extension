<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Deprecated;

use PhpStaticAnalysis\Attributes\Deprecated;

#[Deprecated] // Use NotDeprecatedClassInstead
class ClassDeprecatedAttribute
{
}

$class = new ClassDeprecatedAttribute();
