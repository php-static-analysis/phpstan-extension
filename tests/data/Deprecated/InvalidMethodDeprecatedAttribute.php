<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Deprecated;

use PhpStaticAnalysis\Attributes\Deprecated;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;

class InvalidMethodDeprecatedAttribute
{
    public function getName(
        #[Deprecated]
        string $name
    ): string {
        return $name;
    }

    #[Deprecated]
    #[Deprecated]
    public function getMoreName(): void
    {
    }
}
