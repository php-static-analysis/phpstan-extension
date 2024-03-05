<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class ImportTypeAttributeTest extends BaseAttributeTestCase
{
    public function testClassImportTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ImportType/ClassImportTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceImportTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ImportType/InterfaceImportTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitImportTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ImportType/TraitImportTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassImportTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ImportType/InvalidClassImportTypeAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @phpstan-import-type has invalid value (Unexpected token "(", expected \'*/\' at offset 98 on line 4): Unexpected token "(", expected \'*/\' at offset 98' => 8,
            'Parameter #1 ...$from of attribute class PhpStaticAnalysis\Attributes\ImportType constructor expects string, int given.' => 8,
            'Attribute class PhpStaticAnalysis\Attributes\ImportType does not have the method target.' => 13,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
