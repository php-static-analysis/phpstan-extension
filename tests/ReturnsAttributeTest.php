<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class ReturnsAttributeTest extends BaseAttributeTestCase
{
    public function testMethodReturnsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Returns/MethodReturnsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionReturnsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Returns/FunctionReturnsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodReturnsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Returns/InvalidMethodReturnsAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @return has invalid value (): Unexpected token "\n ", expected type at offset 14 on line 2' => 10,
            'PHPDoc tag @return has invalid value ($a + $b): Unexpected token "$a", expected type at offset 15 on line 2' => 29,
            'Attribute class PhpStaticAnalysis\Attributes\Returns does not have the property target.' => 34,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
