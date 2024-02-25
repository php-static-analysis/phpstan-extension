<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Impure;

use PhpStaticAnalysis\Attributes\Impure;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;

class InvalidMethodImpureAttribute
{
    #[Impure]
    public string $name = '';

    #[Impure]
    #[Impure]
    public function getMoreName(): void
    {
    }
}
