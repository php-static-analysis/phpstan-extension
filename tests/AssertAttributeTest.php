<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class AssertAttributeTest extends BaseAttributeTestCase
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
            'PHPDoc tag @phpstan-assert has invalid value (): Unexpected token "\n ", expected type at offset 22 on line 2' => 10,
            'Attribute class PhpStaticAnalysis\Attributes\Assert does not have the property target.' => 14,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
