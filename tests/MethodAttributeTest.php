<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class MethodAttributeTest extends BaseAttributeTestCase
{
    public function testClassMethodAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Method/ClassMethodAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceMethodAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Method/InterfaceMethodAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitMethodAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Method/TraitMethodAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassMethodAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Method/InvalidClassMethodAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @method has invalid value (): Unexpected token "\n * ", expected type at offset 14 on line 2' => 9,
            'PHPDoc tag @method has invalid value (string): Unexpected token "\n * ", expected \'(\' at offset 32 on line 3' => 10,
            'Attribute class PhpStaticAnalysis\Attributes\Method does not have the method target.' => 13,
            'Call to an undefined method test\PhpStaticAnalysis\PHPStanExtension\data\Method\InvalidClassMethodAttribute::badFunction().' => 31,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
