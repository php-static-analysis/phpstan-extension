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

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'PHPDoc tag @return has invalid value (): Unexpected token "\n ", expected type at offset 14' => 9,
                'Parameter #1 $type of attribute class PhpStaticAnalysis\Attributes\Returns constructor expects string, int given.' => 9,
                'Attribute class PhpStaticAnalysis\Attributes\Returns is not repeatable but is already present above the method.' => 16,
                'Attribute class PhpStaticAnalysis\Attributes\Returns constructor invoked with 2 parameters, 1 required.' => 22,
                'PHPDoc tag @return has invalid value ($a + $b): Unexpected token "$a", expected type at offset 15' => 28,
                'Attribute class PhpStaticAnalysis\Attributes\Returns does not have the property target.' => 34,
            ];
        } else {
            $expectedErrors = [
                'Parameter #1 $type of attribute class PhpStaticAnalysis\Attributes\Returns constructor expects string, int given.' => 9,
                'PHPDoc tag @return has invalid value (): Unexpected token "\n ", expected type at offset 14 on line 2' => 10,
                'Attribute class PhpStaticAnalysis\Attributes\Returns is not repeatable but is already present above the method.' => 16,
                'Attribute class PhpStaticAnalysis\Attributes\Returns constructor invoked with 2 parameters, 1 required.' => 22,
                'PHPDoc tag @return has invalid value ($a + $b): Unexpected token "$a", expected type at offset 15 on line 2' => 29,
                'Attribute class PhpStaticAnalysis\Attributes\Returns does not have the property target.' => 34,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
