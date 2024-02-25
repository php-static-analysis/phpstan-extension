<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Impure;

use PhpStaticAnalysis\Attributes\Impure;

class MethodImpureAttribute
{
    public static int $i = 0;

    #[Impure]
    public static function add(int $left): int
    {
        self::$i += $left;
        return self::$i;
    }

    /**
     * @codeCoverageIgnore
     */
    #[Impure]
    public function addAnother(int $left): int
    {
        self::$i += $left;
        return self::$i;
    }

    /**
     * @impure
     */
    public function addMore(int $left): int
    {
        self::$i += $left;
        return self::$i;
    }
}
