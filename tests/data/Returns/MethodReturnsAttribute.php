<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Returns;

use Exception;
use PhpStaticAnalysis\Attributes\Returns;

class MethodReturnsAttribute
{
    #[Returns('string[]')] // the names of the users
    public function getNames(): array
    {
        return ['hello', 'world'];
    }

    #[Returns(Exception::class)]
    public function getException()
    {
        return new Exception();
    }

    /**
     * @deprecated
     */
    #[Returns('string[]')]
    public function getMoreNames(): array
    {
        return ['hello', 'world'];
    }

    /**
     * @return int
     */
    #[Returns('string[]')]
    public function getEvenMoreNames(): array
    {
        return ['hello', 'world'];
    }

    /**
     * @return string[]
     */
    public function getNamesAndNames(): array
    {
        return ['hello', 'world'];
    }
}
