<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class TemplateCovariantAttributeTest extends BaseAttributeTestCase
{
    public function testClassTemplateCovariantAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateCovariant/ClassTemplateCovariantAttribute.php');
        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [];
        } else {
            $expectedErrors = [
                'PHPDoc tag @var with type TCreable is not subtype of native type object.' => 28,
            ];
        }
        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testTraitTemplateCovariantAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateCovariant/TraitTemplateCovariantAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceTemplateCovariantAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateCovariant/InterfaceTemplateCovariantAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassTemplateCovariantAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateCovariant/InvalidClassTemplateCovariantAttribute.php');

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'PHPDoc tag @template-covariant has invalid value (): Unexpected token "\n * ", expected type at offset 26' => 7,
                'PHPDoc tag @template-covariant has invalid value (+5): Unexpected token "+5", expected type at offset 50' => 7,
                'Parameter #1 $name of attribute class PhpStaticAnalysis\Attributes\TemplateCovariant constructor expects string, int given.' => 7,
                'Parameter #2 $of of attribute class PhpStaticAnalysis\Attributes\TemplateCovariant constructor expects string|null, int given.' => 9,
                'Attribute class PhpStaticAnalysis\Attributes\TemplateCovariant does not have the property target.' => 12,
            ];
        } else {
            $expectedErrors = [
                'Parameter #1 $name of attribute class PhpStaticAnalysis\Attributes\TemplateCovariant constructor expects string, int given.' => 7,
                'PHPDoc tag @template-covariant has invalid value (): Unexpected token "\n * ", expected type at offset 26 on line 2' => 8,
                'PHPDoc tag @template-covariant has invalid value (+5): Unexpected token "+5", expected type at offset 50 on line 3' => 9,
                'Parameter #2 $of of attribute class PhpStaticAnalysis\Attributes\TemplateCovariant constructor expects string|null, int given.' => 9,
                'Attribute class PhpStaticAnalysis\Attributes\TemplateCovariant does not have the property target.' => 12,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
