<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Method;

use PhpStaticAnalysis\Attributes\Method;
use PhpStaticAnalysis\Attributes\Param;

#[Method(0)]
#[Method('string')]
#[Method('count($a)')]
class InvalidClassMethodAttribute
{
    #[Method('string getString()')]
    public function getName(): string
    {
        return "John";
    }

    #[Param(arguments: 'mixed[]')]
    public function __call(string $name, array $arguments): mixed
    {
        $callable = [$this, $name];
        if (is_callable($callable)) {
            return call_user_func_array($callable, $arguments);
        }
        return null;
    }
}

$class = new InvalidClassMethodAttribute();
$class->badFunction();
