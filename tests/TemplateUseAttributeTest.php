<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class TemplateUseAttributeTest extends BaseAttributeTestCase
{
    public function testTraitTemplateUseAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateUse/TraitTemplateUseAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidTraitTemplateUseAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateUse/InvalidTraitTemplateUseAttribute.php');

        $expectedErrors = [
            'Parameter #1 ...$traits of attribute class PhpStaticAnalysis\Attributes\TemplateUse constructor expects string, int given.' => 13,
            'Class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateUse\InvalidClassTemplateUseAttribute uses generic trait test\PhpStaticAnalysis\PHPStanExtension\data\TemplateUse\InvalidTraitTemplateUseAttribute but does not specify its types: T' => 16,
            'Class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateUse\InvalidClassTemplateUseAttribute2 uses generic trait test\PhpStaticAnalysis\PHPStanExtension\data\TemplateUse\InvalidTraitTemplateUseAttribute but does not specify its types: T' => 22,
            'Attribute class PhpStaticAnalysis\Attributes\TemplateUse does not have the property target.' => 24,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
