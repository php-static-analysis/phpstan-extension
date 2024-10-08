<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class ParamOutAttributeTest extends BaseAttributeTestCase
{
    public function testMethodParamOutAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ParamOut/MethodParamOutAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionParamOutAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ParamOut/FunctionParamOutAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodParamOutAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ParamOut/InvalidMethodParamOutAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @param-out has invalid value (): Unexpected token "\n ", expected type at offset 17 on line 2' => 10,
            'PHPDoc tag @param-out has invalid value (string): Unexpected token "\n ", expected variable at offset 24 on line 2' => 16,
            'PHPDoc tag @param-out has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 23 on line 2' => 22,
            'Attribute class PhpStaticAnalysis\Attributes\ParamOut does not have the property target.' => 27,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
