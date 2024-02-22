<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Internal;

use PhpStaticAnalysis\Attributes\Internal;

class PropertyInternalAttribute
{
    #[Internal]
    public const NAME = 'name';

    #[Internal]
    public string $name = '';
}
