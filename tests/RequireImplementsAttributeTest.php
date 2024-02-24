<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class RequireImplementsAttributeTest extends BaseAttributeTestCase
{
    public function testClassRequireImplementsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/RequireImplements/TraitRequireImplementsAttribute.php');
        $expectedErrors = [
            'Trait test\PhpStaticAnalysis\PHPStanExtension\data\RequireImplements\TraitRequireImplementsAttribute requires using class to implement test\PhpStaticAnalysis\PHPStanExtension\data\RequireImplements\InterfaceRequireImplementsAttribute3, but test\PhpStaticAnalysis\PHPStanExtension\data\RequireImplements\ClassRequireImplementsAttribute2 does not.' => 33,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testInvalidClassRequireImplementsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/RequireImplements/InvalidTraitRequireImplementsAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @phpstan-require-implements has invalid value (): Unexpected token "\n ", expected type at offset 34' => 7,
            'Parameter #1 ...$interfaces of attribute class PhpStaticAnalysis\Attributes\RequireImplements constructor expects string, int given.' => 7,
            'PHPDoc tag @phpstan-require-implements contains non-object type int.' => 12,
            'Attribute class PhpStaticAnalysis\Attributes\RequireImplements does not have the property target.' => 15,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
