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
            'PHPDoc tag @var has invalid value (): Unexpected token "\n ", expected type at offset 11 on line 2' => 10,
            'PHPDoc tag @var has invalid value ($a + $b): Unexpected token "$a", expected type at offset 12 on line 2' => 20,
            'Attribute class PhpStaticAnalysis\Attributes\Type does not have the parameter target.' => 23,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
