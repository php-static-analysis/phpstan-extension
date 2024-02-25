<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\ParamOut;

use Exception;
use PhpStaticAnalysis\Attributes\ParamOut;

class MethodParamOutAttribute
{
    #[ParamOut(names: 'int')] // we specify the type of the reference parameter after running the function
    public function setNames(mixed &$names): void
    {
        $names = 1;
    }

    #[ParamOut(exception: Exception::class)]
    public function setException(mixed &$exception): void
    {
        $exception = new Exception();
    }

    #[ParamOut('int $names')]
    public function setUnnamedNames(mixed &$names): void
    {
        $names = 1;
    }

    /**
     * @deprecated
     */
    #[ParamOut(names: 'int')]
    public function setMoreNames(mixed &$names): void
    {
        $names = 1;
    }

    /**
     * @param-out string $names
     */
    #[ParamOut(names: 'int')]
    public function setEvenMoreNames(mixed &$names): void
    {
        $names = 1;
    }

    #[ParamOut(
        names1: 'int',
        names2: 'int'
    )]
    public function setTwoNames(mixed &$names1, mixed &$names2): void
    {
        $names1 = 1;
        $names2 = 2;
    }

    #[ParamOut(names1: 'int')]
    #[ParamOut(names2: 'int')]
    public function setTwoMoreNames(mixed &$names1, mixed &$names2): void
    {
        $names1 = 1;
        $names2 = 2;
    }

    /**
     * @param-out int $names
     */
    public function setNamesAndNames(mixed &$names): void
    {
        $names = 1;
    }

    public function setNamesInParamOut(
        #[ParamOut('int')]
        mixed &$names
    ): void {
        $names = 1;
    }

    public function setNamesInParamOutWithName(
        #[ParamOut(names: 'int')]
        mixed &$names
    ): void {
        $names = 1;
    }

    public function setNamesInTwoParamOuts(
        #[ParamOut('int')]
        mixed &$names1,
        #[ParamOut('int')]
        mixed &$names2
    ): void {
        $names1 = 1;
        $names2 = 2;
    }
}
