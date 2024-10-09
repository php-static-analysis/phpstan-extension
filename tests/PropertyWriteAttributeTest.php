<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class PropertyWriteAttributeTest extends BaseAttributeTestCase
{
    public function testClassPropertyWriteAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/PropertyWrite/ClassPropertyWriteAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfacePropertyWriteAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/PropertyWrite/InterfacePropertyWriteAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitPropertyWriteAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/PropertyWrite/TraitPropertyWriteAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassPropertyWriteAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/PropertyWrite/InvalidClassPropertyWriteAttribute.php');

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'PHPDoc tag @property-write has invalid value (): Unexpected token "\n * ", expected type at offset 22' => 7,
                'PHPDoc tag @property-write has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 73' => 7,
                'PHPDoc tag @property-write has invalid value (string): Unexpected token "\n * ", expected variable at offset 48' => 7,
                'Parameter #1 ...$properties of attribute class PhpStaticAnalysis\Attributes\PropertyWrite constructor expects string, int given.' => 7,
                'Attribute class PhpStaticAnalysis\Attributes\PropertyWrite does not have the method target.' => 13,
                'Property test\PhpStaticAnalysis\PHPStanExtension\data\PropertyWrite\ClassPropertyWriteAttribute::$age is not readable.' => 21,
            ];
        } else {
            $expectedErrors = [
                'Parameter #1 ...$properties of attribute class PhpStaticAnalysis\Attributes\PropertyWrite constructor expects string, int given.' => 7,
                'PHPDoc tag @property-write has invalid value (): Unexpected token "\n * ", expected type at offset 22 on line 2' => 8,
                'PHPDoc tag @property-write has invalid value (string): Unexpected token "\n * ", expected variable at offset 48 on line 3' => 9,
                'PHPDoc tag @property-write has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 73 on line 4' => 10,
                'Attribute class PhpStaticAnalysis\Attributes\PropertyWrite does not have the method target.' => 13,
                'Property test\PhpStaticAnalysis\PHPStanExtension\data\PropertyWrite\ClassPropertyWriteAttribute::$age is not readable.' => 21,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
