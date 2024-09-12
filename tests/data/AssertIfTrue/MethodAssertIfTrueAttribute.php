<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\AssertIfTrue;

use Exception;
use PhpStaticAnalysis\Attributes\AssertIfTrue;

class MethodAssertIfTrueAttribute
{
    #[AssertIfTrue(name: 'string')] // checks name is string
    public function checkString(mixed $name): bool
    {
        return is_string($name);
    }

    #[AssertIfTrue(exception: Exception::class)]
    public function checkException(mixed $exception): bool
    {
        return $exception instanceof Exception;
    }

    #[AssertIfTrue('string $name')]
    public function checkOtherString(mixed $name): bool
    {
        return is_string($name);
    }

    #[AssertIfTrue('string $this->name')]
    public function checkOtherPropertyString(mixed $name): bool
    {
        return is_string($name);
    }

    /**
     * @deprecated
     */
    #[AssertIfTrue(name: 'string')]
    public function checkAnotherString(mixed $name): bool
    {
        return is_string($name);
    }

    /**
     * @assert int $name
     */
    #[AssertIfTrue(name: 'string')]
    public function checkEvenMoreString(mixed $name): bool
    {
        return is_string($name);
    }

    #[AssertIfTrue(
        name1: 'string',
        name2: 'string'
    )]
    public function checkStrings(mixed $name1, mixed $name2): bool
    {
        return is_string($name1) && is_string($name2);
    }

    #[AssertIfTrue(name1: 'string')]
    #[AssertIfTrue(name2: 'string')]
    public function checkOtherStrings(mixed $name1, mixed $name2): bool
    {
        return is_string($name1) && is_string($name2);
    }

    /**
     * @assert string $name
     */
    public function checkMoreAndMoreString(mixed $name): bool
    {
        return is_string($name);
    }

    public function checkStringInParam(
        #[AssertIfTrue('string')]
        mixed $name
    ): bool {
        return is_string($name);
    }

    public function checkStringInParamWithName(
        #[AssertIfTrue(name: 'string')]
        mixed $name
    ): bool {
        return is_string($name);
    }

    public function checkStringInTwoParams(
        #[AssertIfTrue('string')]
        mixed $name1,
        #[AssertIfTrue('string')]
        mixed $name2
    ): bool {
        return is_string($name1) && is_string($name2);
    }
}
