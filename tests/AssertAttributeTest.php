<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class AssertAttributeTest extends BaseAttributeTestCase
{
    public function testMethodAssertAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Assert/MethodAssertAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionAssertAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Assert/FunctionAssertAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodAssertAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Assert/InvalidMethodAssertAttribute.php');

        $expectedErrors = [
            'Parameter #1 ...$params of attribute class PhpStaticAnalysis\Attributes\Assert constructor expects string, int given.' => 9,
            'Attribute class PhpStaticAnalysis\Attributes\Assert does not have the property target.' => 14,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
