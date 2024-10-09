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

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'PHPDoc tag @property-read has invalid value (): Unexpected token "\n * ", expected type at offset 21' => 7,
                'PHPDoc tag @property-read has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 70' => 7,
                'PHPDoc tag @property-read has invalid value (string): Unexpected token "\n * ", expected variable at offset 46' => 7,
                'Parameter #1 ...$properties of attribute class PhpStaticAnalysis\Attributes\PropertyRead constructor expects string, int given.' => 7,
                'Attribute class PhpStaticAnalysis\Attributes\PropertyRead does not have the method target.' => 13,
                'Property test\PhpStaticAnalysis\PHPStanExtension\data\PropertyRead\ClassPropertyReadAttribute::$age is not writable.' => 21,
            ];
        } else {
            $expectedErrors = [
                'Parameter #1 ...$properties of attribute class PhpStaticAnalysis\Attributes\PropertyRead constructor expects string, int given.' => 7,
                'PHPDoc tag @property-read has invalid value (): Unexpected token "\n * ", expected type at offset 21 on line 2' => 8,
                'PHPDoc tag @property-read has invalid value (string): Unexpected token "\n * ", expected variable at offset 46 on line 3' => 9,
                'PHPDoc tag @property-read has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 70 on line 4' => 10,
                'Attribute class PhpStaticAnalysis\Attributes\PropertyRead does not have the method target.' => 13,
                'Property test\PhpStaticAnalysis\PHPStanExtension\data\PropertyRead\ClassPropertyReadAttribute::$age is not writable.' => 21,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
