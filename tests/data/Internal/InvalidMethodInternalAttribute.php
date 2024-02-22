<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Internal;

use PhpStaticAnalysis\Attributes\Internal;

class InvalidMethodInternalAttribute
{
    #[Internal(0)]
    public function getName(): void
    {
    }

    public function getExtraName(
        #[Internal]
        string $name
    ): string {
        return $name;
    }

    #[Internal]
    #[Internal]
    public function getMoreName(): void
    {
    }
}
