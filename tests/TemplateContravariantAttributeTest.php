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

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'PHPDoc tag @template-contravariant has invalid value (): Unexpected token "\n * ", expected type at offset 30' => 7,
                'PHPDoc tag @template-contravariant has invalid value (+5): Unexpected token "+5", expected type at offset 58' => 7,
                'Parameter #1 $name of attribute class PhpStaticAnalysis\Attributes\TemplateContravariant constructor expects string, int given.' => 7,
                'Parameter #2 $of of attribute class PhpStaticAnalysis\Attributes\TemplateContravariant constructor expects string|null, int given.' => 9,
                'Attribute class PhpStaticAnalysis\Attributes\TemplateContravariant does not have the property target.' => 12,
            ];
        } else {
            $expectedErrors = [
                'Parameter #1 $name of attribute class PhpStaticAnalysis\Attributes\TemplateContravariant constructor expects string, int given.' => 7,
                'PHPDoc tag @template-contravariant has invalid value (): Unexpected token "\n * ", expected type at offset 30 on line 2' => 8,
                'PHPDoc tag @template-contravariant has invalid value (+5): Unexpected token "+5", expected type at offset 58 on line 3' => 9,
                'Parameter #2 $of of attribute class PhpStaticAnalysis\Attributes\TemplateContravariant constructor expects string|null, int given.' => 9,
                'Attribute class PhpStaticAnalysis\Attributes\TemplateContravariant does not have the property target.' => 12,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
