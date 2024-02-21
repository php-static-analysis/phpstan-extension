<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Deprecated;

#[Deprecated]
function returnDeprecated(): void
{
}
