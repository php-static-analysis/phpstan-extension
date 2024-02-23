<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class TemplateExtendsAttributeTest extends BaseAttributeTestCase
{
    public function testClassTemplateExtendsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateExtends/ClassTemplateExtendsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassTemplateExtendsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateExtends/InvalidClassTemplateExtendsAttribute.php');

        $expectedErrors = [
            'Class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateExtends\InvalidClassTemplateExtendsAttributeChild extends generic class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateExtends\InvalidClassTemplateExtendsAttribute but does not specify its types: T' => 13,
            'PHPDoc tag @template-extends has invalid value (): Unexpected token "\n ", expected type at offset 24' => 13,
            'Parameter #1 $class of attribute class PhpStaticAnalysis\Attributes\TemplateExtends constructor expects string, int given.' => 13,
            'Class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateExtends\InvalidClassTemplateExtendsAttributeChild2 extends generic class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateExtends\InvalidClassTemplateExtendsAttribute but does not specify its types: T' => 18,
            'PHPDoc tag @template-extends has invalid value (+5): Unexpected token "+5", expected type at offset 25' => 18,
            'Attribute class PhpStaticAnalysis\Attributes\TemplateExtends is not repeatable but is already present above the class.' => 24,
            'Attribute class PhpStaticAnalysis\Attributes\TemplateExtends does not have the property target.' => 27,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
