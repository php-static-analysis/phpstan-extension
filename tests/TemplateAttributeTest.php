<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class TemplateAttributeTest extends BaseAttributeTestCase
{
    public function testClassTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ClassTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TraitTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/InterfaceTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/MethodTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/FunctionTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodTemplateAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/InvalidMethodTemplateAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @template has invalid value (): Unexpected token "\n ", expected type at offset 16' => 11,
            'Parameter #1 $name of attribute class PhpStaticAnalysis\Attributes\Template constructor expects string, int given.' => 11,
            'PHPDoc tag @template has invalid value (+5): Unexpected token "+5", expected type at offset 17' => 17,
            'Attribute class PhpStaticAnalysis\Attributes\Template does not have the property target.' => 23,
            'Parameter #2 $of of attribute class PhpStaticAnalysis\Attributes\Template constructor expects string|null, int given.' => 26
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
