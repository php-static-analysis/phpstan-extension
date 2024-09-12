<?php


use test\PhpStaticAnalysis\PHPStanExtension\BaseAttributeTestCase;

class AssertIfFalseAttributeTest extends BaseAttributeTestCase
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
            'Parameter #1 ...$params of attribute class PhpStaticAnalysis\Attributes\AssertIfFalse constructor expects string, int given.' => 9,
            'Attribute class PhpStaticAnalysis\Attributes\AssertIfFalse does not have the property target.' => 15,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
