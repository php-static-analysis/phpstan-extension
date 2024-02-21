<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Type;

use PhpStaticAnalysis\Attributes\Type;

class PropertyTypeAttribute
{
    #[Type('string')]
    public const ATTRIBUTE_NAME = 'Type';

    #[Type('int[]')] // number of items
    public array $nums;

    /**
     * @var string
     */
    public string $string;

    #[Type('string')]
    public function getString(): string
    {
        return 'hello';
    }
}
