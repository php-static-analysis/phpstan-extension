<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class ImpureAttributeTest extends BaseAttributeTestCase
{
    public function testMethodImpureAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Impure/MethodImpureAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionImpureAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Impure/FunctionImpureAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodImpureAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Impure/InvalidMethodImpureAttribute.php');

        $expectedErrors = [
            'Attribute class PhpStaticAnalysis\Attributes\Impure does not have the property target.' => 11,
            'Attribute class PhpStaticAnalysis\Attributes\Impure is not repeatable but is already present above the method.' => 15,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
