<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Type;

use Exception;
use PhpStaticAnalysis\Attributes\Type;

#[Type('StringArray string[]')]
class PropertyTypeAttribute
{
    #[Type('string')]
    public const ATTRIBUTE_NAME = 'Type';

    #[Type('int[]')] // number of items
    public array $nums;

    #[Type(Exception::class)]
    public $exception;

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
