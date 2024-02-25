<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Throws;

use Error;
use Exception;
use PhpStaticAnalysis\Attributes\Throws;

class MethodThrowsAttribute
{
    #[Throws(Exception::class)] // returns the number of names
    public function countName(string $name): int
    {
        if ($name == '') {
            throw new Exception('Empty string!');
        }
        return strlen($name);
    }

    /**
     * @deprecated
     */
    #[Throws(Exception::class)]
    public function countMoreName(string $name): int
    {
        if ($name == '') {
            throw new Exception('Empty string!');
        }
        return strlen($name);
    }

    /**
     * @throws Exception
     */
    #[Throws(Exception::class)]
    public function countEvenMoreName(string $name): int
    {
        if ($name == '') {
            throw new Exception('Empty string!');
        }
        return strlen($name);
    }

    #[Throws(
        Exception::class,
        Error::class
    )]
    public function countTwoNames(string $name1, string $name2): int
    {
        if ($name1 == '') {
            throw new Exception('Empty string!');
        }
        if ($name2 == '') {
            throw new Error('Empty string!');
        }
        return strlen($name1 . $name2);
    }

    #[Throws(Exception::class)]
    #[Throws(Error::class)]
    public function countOtherTwoNames(string $name1, string $name2): int
    {
        if ($name1 == '') {
            throw new Exception('Empty string!');
        }
        if ($name2 == '') {
            throw new Error('Empty string!');
        }
        return strlen($name1 . $name2);
    }

    #[Throws(Exception::class)]
    public function countNoErrorName(string $name): int
    {
        return strlen($name);
    }

    /**
     * @throws Exception
     */
    public function countNameExtra(string $name): int
    {
        if ($name == '') {
            throw new Exception('Empty string!');
        }
        return strlen($name);
    }
}
