<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class TemplateContravariantAttributeTest extends BaseAttributeTestCase
{
    public function testClassTemplateContravariantAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateContravariant/ClassTemplateContravariantAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitTemplateContravariantAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateContravariant/TraitTemplateContravariantAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceTemplateContravariantAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateContravariant/InterfaceTemplateContravariantAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassTemplateContravariantAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateContravariant/InvalidClassTemplateContravariantAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @template-contravariant has invalid value (): Unexpected token "\n * ", expected type at offset 30 on line 2' => 8,
            'PHPDoc tag @template-contravariant has invalid value (+5): Unexpected token "+5", expected type at offset 58 on line 3' => 9,
            'Attribute class PhpStaticAnalysis\Attributes\TemplateContravariant does not have the property target.' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
