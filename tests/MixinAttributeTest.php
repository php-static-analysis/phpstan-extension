<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class MixinAttributeTest extends BaseAttributeTestCase
{
    public function testClassMixinAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Mixin/ClassMixinAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceMixinAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Mixin/InterfaceMixinAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitMixinAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Mixin/TraitMixinAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassMixinAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Mixin/InvalidClassMixinAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @mixin contains unknown class test\PhpStaticAnalysis\PHPStanExtension\data\Mixin\count.' => 7,
            'PHPDoc tag @mixin has invalid value (): Unexpected token "\n * ", expected type at offset 13' => 7,
            'Parameter #1 ...$params of attribute class PhpStaticAnalysis\Attributes\Mixin constructor expects string, int given.' => 7,
            'Attribute class PhpStaticAnalysis\Attributes\Mixin does not have the method target.' => 11,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
