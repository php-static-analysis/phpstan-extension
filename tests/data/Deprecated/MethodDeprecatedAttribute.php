<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Deprecated;

use PhpStaticAnalysis\Attributes\Deprecated;

class MethodDeprecatedAttribute
{
    #[Deprecated]
    public function returnDeprecated(): void
    {
    }

    /**
     * @codeCoverageIgnore
     */
    #[Deprecated]
    public function returnAnotherDeprecated(): void
    {
    }

    /**
     * @deprecated
     */
    public function returnMoreDeprecateds(): void
    {
    }
}

$class = new MethodDeprecatedAttribute();
$class->returnDeprecated();
