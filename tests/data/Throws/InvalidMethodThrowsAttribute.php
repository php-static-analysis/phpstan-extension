<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Throws;

use Exception;
use PhpStaticAnalysis\Attributes\Throws;

class InvalidMethodThrowsAttribute
{
    #[Throws(0)]
    public function getNameLength(string $name): int
    {
        return strlen($name);
    }

    #[Throws('string')]
    public function getOtherNameLength(string $name): int
    {
        return strlen($name);
    }

    #[Throws(Exception::class)]
    public string $property;
}
