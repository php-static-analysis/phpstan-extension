<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Returns;

use PhpStaticAnalysis\Attributes\Returns;

class InvalidMethodReturnsAttribute
{
    #[Returns(0)]
    public function getName(): string
    {
        return 'hello';
    }

    #[Returns('string')]
    #[Returns('string')]
    public function getOtherName(): string
    {
        return 'hello';
    }

    #[Returns('string', 'string')]
    public function getEvenMoreNames(): string
    {
        return 'hello';
    }

    #[Returns('$a + $b')]
    public function getMoreAndMoreNames(): string
    {
        return 'hello';
    }

    #[Returns('string')]
    public string $property;
}
