<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class RequireExtendsAttributeTest extends BaseAttributeTestCase
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
            'PHPDoc tag @phpstan-require-extends has invalid value (): Unexpected token "\n ", expected type at offset 31 on line 2' => 8,
            'PHPDoc tag @phpstan-require-extends contains non-object type int.' => 12,
            'PHPDoc tag @phpstan-require-extends can only be used once.' => 17,
            'Attribute class PhpStaticAnalysis\Attributes\RequireExtends does not have the property target.' => 21,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
