<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class PropertyAttributeTest extends BaseAttributeTestCase
{
    public function testClassPropertyAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Property/ClassPropertyAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfacePropertyAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Property/InterfacePropertyAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitPropertyAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Property/TraitPropertyAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassPropertyAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Property/InvalidClassPropertyAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @property has invalid value (): Unexpected token "\n * ", expected type at offset 16 on line 2' => 8,
            'PHPDoc tag @property has invalid value (string): Unexpected token "\n * ", expected variable at offset 36 on line 3' => 9,
            'PHPDoc tag @property has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 55 on line 4' => 10,
            'Attribute class PhpStaticAnalysis\Attributes\Property does not have the method target.' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
