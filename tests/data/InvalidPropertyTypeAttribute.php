<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\Type;

class InvalidPropertyTypeAttribute
{
    #[Type(0)]
    public string $invalidProperty;

    #[Type('string')]
    #[Type('string')]
    public string $otherInvalidProperty;

    #[Type('string', 'string')]
    public string $anotherInvalidProperty;

    #[Type('$a + $b')]
    public string $andAnotherinvalidProperty;

    #[Type('string')]
    public function getString(): string
    {
        return 'hello';
    }
}
