<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Pure;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Pure;
use PhpStaticAnalysis\Attributes\Returns;

class InvalidMethodPureAttribute
{
    #[Pure]
    public string $name = '';

    #[Pure]
    #[Pure]
    public function getMoreName(): void
    {
    }
}
