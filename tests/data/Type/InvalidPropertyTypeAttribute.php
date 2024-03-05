<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Type;

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

    public function getName(
        #[Type('string')]
        string $user
    ): void {
    }
}
