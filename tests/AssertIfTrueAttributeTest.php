<?php


use test\PhpStaticAnalysis\PHPStanExtension\BaseAttributeTestCase;

class AssertIfTrueAttributeTest extends BaseAttributeTestCase
{
    public function testMethodAssertIfTrueAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/AssertIfTrue/MethodAssertIfTrueAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionAssertIfTrueAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/AssertIfTrue/FunctionAssertIfTrueAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodAssertIfTrueAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/AssertIfTrue/InvalidMethodAssertIfTrueAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @phpstan-assert-if-true has invalid value (): Unexpected token "\n ", expected type at offset 30 on line 2' => 10,
            'Attribute class PhpStaticAnalysis\Attributes\AssertIfTrue does not have the property target.' => 15,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
