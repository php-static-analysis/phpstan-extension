<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class TemplateImplementsAttributeTest extends BaseAttributeTestCase
{
    public function testInterfaceTemplateImplementsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateImplements/InterfaceTemplateImplementsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidInterfaceTemplateImplementsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/TemplateImplements/InvalidInterfaceTemplateImplementsAttribute.php');

        $expectedErrors = [
            'Class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateImplements\InvalidClassTemplateImplementsAttribute implements generic interface test\PhpStaticAnalysis\PHPStanExtension\data\TemplateImplements\InvalidInterfaceTemplateImplementsAttribute but does not specify its types: T' => 13,
            'PHPDoc tag @template-implements has invalid value (): Unexpected token "\n ", expected type at offset 27' => 13,
            'Parameter #1 ...$interfaces of attribute class PhpStaticAnalysis\Attributes\TemplateImplements constructor expects string, int given.' => 13,
            'Class test\PhpStaticAnalysis\PHPStanExtension\data\TemplateImplements\InvalidClassTemplateImplementsAttribute2 implements generic interface test\PhpStaticAnalysis\PHPStanExtension\data\TemplateImplements\InvalidInterfaceTemplateImplementsAttribute but does not specify its types: T' => 18,
            'PHPDoc tag @template-implements has invalid value (+5): Unexpected token "+5", expected type at offset 28' => 18,
            'Attribute class PhpStaticAnalysis\Attributes\TemplateImplements does not have the property target.' => 21,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
