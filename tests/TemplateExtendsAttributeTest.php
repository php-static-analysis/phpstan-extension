<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class TemplateExtendsAttributeTest extends BaseAttributeTestCase
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
            'PHPDoc tag @template-extends has invalid value (): Unexpected token "\n ", expected type at offset 24 on line 2' => 14,
            'Class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateExtends\InvalidClassTemplateExtendsAttributeChild2 extends generic class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateExtends\InvalidClassTemplateExtendsAttribute but does not specify its types: T' => 18,
            'PHPDoc tag @template-extends has invalid value (+5): Unexpected token "+5", expected type at offset 25 on line 2' => 19,
            'Attribute class PhpStaticAnalysis\Attributes\TemplateExtends does not have the property target.' => 27,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
