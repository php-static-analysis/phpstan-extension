<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class TypeAttributeTest extends BaseAttributeTestCase
{
    public function testPropertyTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Type/PropertyTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidPropertyTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Type/InvalidPropertyTypeAttribute.php');

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'PHPDoc tag @var has invalid value (): Unexpected token "\n ", expected type at offset 11' => 9,
                'Parameter #1 $type of attribute class PhpStaticAnalysis\Attributes\Type constructor expects string, int given.' => 9,
                'Attribute class PhpStaticAnalysis\Attributes\Type is not repeatable but is already present above the property.' => 13,
                'Attribute class PhpStaticAnalysis\Attributes\Type constructor invoked with 2 parameters, 1 required.' => 16,
                'PHPDoc tag @var has invalid value ($a + $b): Unexpected token "$a", expected type at offset 12' => 19,
                'Attribute class PhpStaticAnalysis\Attributes\Type does not have the parameter target.' => 23,
            ];
        } else {
            $expectedErrors = [
                'Parameter #1 $type of attribute class PhpStaticAnalysis\Attributes\Type constructor expects string, int given.' => 9,
                'PHPDoc tag @var has invalid value (): Unexpected token "\n ", expected type at offset 11 on line 2' => 10,
                'Attribute class PhpStaticAnalysis\Attributes\Type is not repeatable but is already present above the property.' => 13,
                'Attribute class PhpStaticAnalysis\Attributes\Type constructor invoked with 2 parameters, 1 required.' => 16,
                'PHPDoc tag @var has invalid value ($a + $b): Unexpected token "$a", expected type at offset 12 on line 2' => 20,
                'Attribute class PhpStaticAnalysis\Attributes\Type does not have the parameter target.' => 23,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
