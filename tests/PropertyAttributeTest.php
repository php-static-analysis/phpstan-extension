<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class PropertyAttributeTest extends BaseAttributeTestCase
{
    public function testClassPropertyAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/ClassPropertyAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassPropertyAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/InvalidClassPropertyAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @property has invalid value (): Unexpected token "\n * ", expected type at offset 16' => 7,
            'PHPDoc tag @property has invalid value (count($a) $name): Unexpected token "(", expected variable at offset 55' => 7,
            'PHPDoc tag @property has invalid value (string): Unexpected token "\n * ", expected variable at offset 36' => 7,
            'Parameter #1 ...$params of attribute class PhpStaticAnalysis\Attributes\Property constructor expects string, int given.' => 7,
            'Attribute class PhpStaticAnalysis\Attributes\Property does not have the method target.' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
