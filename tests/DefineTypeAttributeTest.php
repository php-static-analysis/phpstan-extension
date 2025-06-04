<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class DefineTypeAttributeTest extends BaseAttributeTestCase
{
    public function testClassDefineTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/DefineType/ClassDefineTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceDefineTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/DefineType/InterfaceDefineTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitDefineTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/DefineType/TraitDefineTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassDefineTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/DefineType/InvalidClassDefineTypeAttribute.php');

        $expectedErrors = [
            'Type alias has an invalid name: string.' => 7,
            'PHPDoc tag @phpstan-type has invalid value (): Unexpected token "\n * ", expected type at offset 20 on line 2' => 8,
            'PHPDoc tag @phpstan-type string has invalid value: Unexpected token "\n * ", expected type at offset 44 on line 3' => 9,
            'PHPDoc tag @phpstan-type name has invalid value: Unexpected token "(", expected TOKEN_PHPDOC_EOL at offset 72 on line 4' => 10,
            'Attribute class PhpStaticAnalysis\Attributes\DefineType does not have the method target.' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
