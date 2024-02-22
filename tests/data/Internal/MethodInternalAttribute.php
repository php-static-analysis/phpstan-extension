<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Internal;

use PhpStaticAnalysis\Attributes\Internal;

class MethodInternalAttribute
{
    #[Internal]
    public function returnInternal(): void
    {
    }

    /**
     * @codeCoverageIgnore
     */
    #[Internal]
    public function returnAnotherInternal(): void
    {
    }

    /**
     * @internal
     */
    public function returnMoreInternals(): void
    {
    }
}
