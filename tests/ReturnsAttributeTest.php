<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class ReturnsAttributeTest extends BaseAttributeTestCase
{
    public function testMethodReturnsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/MethodReturnsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionReturnsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/FunctionReturnsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodReturnsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/InvalidMethodReturnsAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @return has invalid value (): Unexpected token "\n ", expected type at offset 14' => 9,
            'Parameter #1 $type of attribute class PhpStaticAnalysis\Attributes\Returns constructor expects string, int given.' => 9,
            'Attribute class PhpStaticAnalysis\Attributes\Returns is not repeatable but is already present above the method.' => 16,
            'Attribute class PhpStaticAnalysis\Attributes\Returns constructor invoked with 2 parameters, 1 required.' => 22,
            'PHPDoc tag @return has invalid value ($a + $b): Unexpected token "$a", expected type at offset 15' => 28,
            'Attribute class PhpStaticAnalysis\Attributes\Returns does not have the property target.' => 34,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
