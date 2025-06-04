<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class TemplateAttributeTest extends BaseAttributeTestCase
{
    public function testClassTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Template/ClassTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Template/TraitTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Template/InterfaceTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Template/MethodTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Template/FunctionTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Template/InvalidMethodTemplateAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @template has invalid value (): Unexpected token "\n ", expected type at offset 16 on line 2' => 12,
            'PHPDoc tag @template has invalid value (+5): Unexpected token "+5", expected type at offset 17 on line 2' => 18,
            'Attribute class PhpStaticAnalysis\Attributes\Template does not have the property target.' => 23,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
