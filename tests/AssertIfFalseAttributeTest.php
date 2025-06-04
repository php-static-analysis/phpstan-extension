<?php


use test\PhpStaticAnalysis\PHPStanExtension\BaseAttributeTestCase;

final class AssertIfFalseAttributeTest extends BaseAttributeTestCase
{
    public function testMethodAssertIfFalseAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/AssertIfFalse/MethodAssertIfFalseAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionAssertIfFalseAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/AssertIfFalse/FunctionAssertIfFalseAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodAssertIfFalseAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/AssertIfFalse/InvalidMethodAssertIfFalseAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @phpstan-assert-if-false has invalid value (): Unexpected token "\n ", expected type at offset 31 on line 2' => 10,
            'Attribute class PhpStaticAnalysis\Attributes\AssertIfFalse does not have the property target.' => 15,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
