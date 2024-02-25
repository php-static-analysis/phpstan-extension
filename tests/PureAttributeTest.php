<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class PureAttributeTest extends BaseAttributeTestCase
{
    public function testMethodPureAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Pure/MethodPureAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionPureAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Pure/FunctionPureAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodPureAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Pure/InvalidMethodPureAttribute.php');

        $expectedErrors = [
            'Attribute class PhpStaticAnalysis\Attributes\Pure does not have the property target.' => 11,
            'Attribute class PhpStaticAnalysis\Attributes\Pure is not repeatable but is already present above the method.' => 15,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
