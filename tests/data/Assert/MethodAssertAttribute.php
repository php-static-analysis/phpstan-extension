<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Assert;

use Exception;
use PhpStaticAnalysis\Attributes\Assert;

class MethodAssertAttribute
{
    #[Assert(name: 'string')] // checks name is string
    public function checkString(mixed $name): void
    {
        if (!is_string($name)) {
            throw new Exception();
        }
    }

    #[Assert(exception: Exception::class)]
    public function checkException(mixed $exception): void
    {
        if (!$exception instanceof Exception) {
            throw new Exception();
        }
    }

    #[Assert('string $name')]
    public function checkOtherString(mixed $name): void
    {
        if (!is_string($name)) {
            throw new Exception();
        }
    }

    /**
     * @deprecated
     */
    #[Assert(name: 'string')]
    public function checkAnotherString(mixed $name): void
    {
        if (!is_string($name)) {
            throw new Exception();
        }
    }

    /**
     * @assert int $name
     */
    #[Assert(name: 'string')]
    public function checkEvenMoreString(mixed $name): void
    {
        if (!is_string($name)) {
            throw new Exception();
        }
    }

    #[Assert(
        name1: 'string',
        name2: 'string'
    )]
    public function checkStrings(mixed $name1, mixed $name2): void
    {
        if (!is_string($name1) || !is_string($name2)) {
            throw new Exception();
        }
    }

    #[Assert(name1: 'string')]
    #[Assert(name2: 'string')]
    public function checkOtherStrings(mixed $name1, mixed $name2): void
    {
        if (!is_string($name1) || !is_string($name2)) {
            throw new Exception();
        }
    }

    /**
     * @assert string $name
     */
    public function checkMoreAndMoreString(mixed $name): void
    {
        if (!is_string($name)) {
            throw new Exception();
        }
    }

    public function checkStringInParam(
        #[Assert('string')]
        mixed $name
    ): void {
        if (!is_string($name)) {
            throw new Exception();
        }
    }

    public function checkStringInParamWithName(
        #[Assert(name: 'string')]
        mixed $name
    ): void {
        if (!is_string($name)) {
            throw new Exception();
        }
    }

    public function checkStringInTwoParams(
        #[Assert('string')]
        mixed $name1,
        #[Assert('string')]
        mixed $name2
    ): void {
        if (!is_string($name1) || !is_string($name2)) {
            throw new Exception();
        }
    }
}
