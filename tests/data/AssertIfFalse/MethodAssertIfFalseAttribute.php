<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\AssertIfFalse;

use Exception;
use PhpStaticAnalysis\Attributes\AssertIfFalse;

class MethodAssertIfFalseAttribute
{
    #[AssertIfFalse(name: 'string')] // checks name is string
    public function checkString(mixed $name): bool
    {
        return !is_string($name);
    }

    #[AssertIfFalse(exception: Exception::class)]
    public function checkException(mixed $exception): bool
    {
        return !$exception instanceof Exception;
    }

    #[AssertIfFalse('string $name')]
    public function checkOtherString(mixed $name): bool
    {
        return !is_string($name);
    }

    #[AssertIfFalse('string $this->name')]
    public function checkOtherPropertyString(mixed $name): bool
    {
        return !is_string($name);
    }

    /**
     * @deprecated
     */
    #[AssertIfFalse(name: 'string')]
    public function checkAnotherString(mixed $name): bool
    {
        return !is_string($name);
    }

    /**
     * @assert int $name
     */
    #[AssertIfFalse(name: 'string')]
    public function checkEvenMoreString(mixed $name): bool
    {
        return !is_string($name);
    }

    #[AssertIfFalse(
        name1: 'string',
        name2: 'string'
    )]
    public function checkStrings(mixed $name1, mixed $name2): bool
    {
        return !is_string($name1) || !is_string($name2);
    }

    #[AssertIfFalse(name1: 'string')]
    #[AssertIfFalse(name2: 'string')]
    public function checkOtherStrings(mixed $name1, mixed $name2): bool
    {
        return !is_string($name1) || !is_string($name2);
    }

    /**
     * @assert string $name
     */
    public function checkMoreAndMoreString(mixed $name): bool
    {
        return !is_string($name);
    }

    public function checkStringInParam(
        #[AssertIfFalse('string')]
        mixed $name
    ): bool {
        return !is_string($name);
    }

    public function checkStringInParamWithName(
        #[AssertIfFalse(name: 'string')]
        mixed $name
    ): bool {
        return !is_string($name);
    }

    public function checkStringInTwoParams(
        #[AssertIfFalse('string')]
        mixed $name1,
        #[AssertIfFalse('string')]
        mixed $name2
    ): bool {
        return !is_string($name1) || !is_string($name2);
    }
}
