<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Pure;

use PhpStaticAnalysis\Attributes\Pure;

class MethodPureAttribute
{
    #[Pure]
    public function add(int $left, int $right): int
    {
        return $left + $right;
    }

    /**
     * @codeCoverageIgnore
     */
    #[Pure]
    public function addAnother(int $left, int $right): int
    {
        return $left + $right;
    }

    /**
     * @pure
     */
    public function addMore(int $left, int $right): int
    {
        return $left + $right;
    }
}
