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

        $expectedErrors = [
            'Attribute class PhpStaticAnalysis\Attributes\Type does not have the class target.' => 7,
            'PHPDoc tag @var has invalid value (): Unexpected token "\n ", expected type at offset 11' => 10,
            'Parameter #1 $type of attribute class PhpStaticAnalysis\Attributes\Type constructor expects string, int given.' => 10,
            'Attribute class PhpStaticAnalysis\Attributes\Type is not repeatable but is already present above the property.' => 14,
            'Attribute class PhpStaticAnalysis\Attributes\Type constructor invoked with 2 parameters, 1 required.' => 17,
            'PHPDoc tag @var has invalid value ($a + $b): Unexpected token "$a", expected type at offset 12' => 20,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
