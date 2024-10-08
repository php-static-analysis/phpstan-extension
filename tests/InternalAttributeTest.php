<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class InternalAttributeTest extends BaseAttributeTestCase
{
    public function testClassInternalAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Internal/ClassInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitInternalAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Internal/TraitInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceInternalAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Internal/InterfaceInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodInternalAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Internal/MethodInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionInternalAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Internal/FunctionInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testPropertyInternalAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Internal/PropertyInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodInternalAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Internal/InvalidMethodInternalAttribute.php');
        $expectedErrors = [
            'Attribute class PhpStaticAnalysis\Attributes\Internal does not have the parameter target.' => 15,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
