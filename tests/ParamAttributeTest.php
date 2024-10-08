<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class ParamAttributeTest extends BaseAttributeTestCase
{
    public function testMethodParamAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Param/MethodParamAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionParamAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Param/FunctionParamAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodParamAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Param/InvalidMethodParamAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @param has invalid value (): Unexpected token "\n ", expected type at offset 13 on line 2' => 10,
            'PHPDoc tag @param has invalid value (string): Unexpected token "\n ", expected variable at offset 20 on line 2' => 16,
            'PHPDoc tag @param has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 19 on line 2' => 22,
            'Attribute class PhpStaticAnalysis\Attributes\Param does not have the property target.' => 27,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
