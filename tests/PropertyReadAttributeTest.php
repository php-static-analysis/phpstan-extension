<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class PropertyReadAttributeTest extends BaseAttributeTestCase
{
    public function testClassPropertyReadAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/PropertyRead/ClassPropertyReadAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfacePropertyReadAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/PropertyRead/InterfacePropertyReadAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitPropertyReadAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/PropertyRead/TraitPropertyReadAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassPropertyReadAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/PropertyRead/InvalidClassPropertyReadAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @property-read has invalid value (): Unexpected token "\n * ", expected type at offset 21' => 7,
            'PHPDoc tag @property-read has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 70' => 7,
            'PHPDoc tag @property-read has invalid value (string): Unexpected token "\n * ", expected variable at offset 46' => 7,
            'Parameter #1 ...$params of attribute class PhpStaticAnalysis\Attributes\PropertyRead constructor expects string, int given.' => 7,
            'Attribute class PhpStaticAnalysis\Attributes\PropertyRead does not have the method target.' => 13,
            'Property test\PhpStaticAnalysis\PHPStanExtension\data\PropertyRead\ClassPropertyReadAttribute::$age is not writable.' => 21,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
