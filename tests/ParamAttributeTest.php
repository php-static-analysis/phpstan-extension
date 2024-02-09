<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class ParamAttributeTest extends BaseAttributeTestCase
{
    public function testMethodParamAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/MethodParamAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionParamAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/FunctionParamAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodReturnsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/InvalidMethodParamAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @param has invalid value (): Unexpected token "\n ", expected type at offset 13' => 9,
            'Parameter #1 ...$params of attribute class PhpStaticAnalysis\Attributes\Param constructor expects string, int given.' => 9,
            'PHPDoc tag @param has invalid value (string): Unexpected token "\n ", expected variable at offset 20' => 15,
            'PHPDoc tag @param has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 19' => 21,
            'Attribute class PhpStaticAnalysis\Attributes\Param does not have the property target.' => 27,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
