<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class MixinAttributeTest extends BaseAttributeTestCase
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
            'PHPDoc tag @mixin has invalid value (): Unexpected token "\n * ", expected type at offset 13 on line 2' => 8,
            'PHPDoc tag @mixin has invalid value (count($a)): Unexpected token "(", expected TOKEN_HORIZONTAL_WS at offset 29 on line 3' => 9,
            'Attribute class PhpStaticAnalysis\Attributes\Mixin does not have the method target.' => 11,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
