<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class RequireExtendsAttributeTest extends BaseAttributeTestCase
{
    public function testClassRequireExtendsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/RequireExtends/TraitRequireExtendsAttribute.php');
        $expectedErrors = [
            'Trait test\PhpStaticAnalysis\PHPStanExtension\data\RequireExtends\TraitRequireExtendsAttribute requires using class to extend test\PhpStaticAnalysis\PHPStanExtension\data\RequireExtends\ClassRequireExtendsAttribute, but test\PhpStaticAnalysis\PHPStanExtension\data\RequireExtends\ClassRequireExtendsAttributeChild2 does not.' => 21,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testInvalidClassRequireExtendsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/RequireExtends/InvalidTraitRequireExtendsAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @phpstan-require-extends has invalid value (): Unexpected token "\n ", expected type at offset 31' => 7,
            'Parameter #1 $class of attribute class PhpStaticAnalysis\Attributes\RequireExtends constructor expects string, int given.' => 7,
            'PHPDoc tag @phpstan-require-extends contains non-object type int.' => 12,
            'PHPDoc tag @phpstan-require-extends can only be used once.' => 17,
            'Attribute class PhpStaticAnalysis\Attributes\RequireExtends is not repeatable but is already present above the class.' => 18,
            'Attribute class PhpStaticAnalysis\Attributes\RequireExtends does not have the property target.' => 21,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
