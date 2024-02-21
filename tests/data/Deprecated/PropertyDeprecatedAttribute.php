<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Deprecated;

use PhpStaticAnalysis\Attributes\Deprecated;

class PropertyDeprecatedAttribute
{
    #[Deprecated]
    public const NAME = 'name';

    #[Deprecated]
    public string $name = '';
}
