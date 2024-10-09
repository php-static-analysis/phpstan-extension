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

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'PHPDoc tag @mixin contains unknown class test\PhpStaticAnalysis\PHPStanExtension\data\Mixin\count.' => 7,
                'PHPDoc tag @mixin has invalid value (): Unexpected token "\n * ", expected type at offset 13' => 7,
                'Parameter #1 ...$classes of attribute class PhpStaticAnalysis\Attributes\Mixin constructor expects string, int given.' => 7,
                'Attribute class PhpStaticAnalysis\Attributes\Mixin does not have the method target.' => 11,
            ];
        } else {
            $expectedErrors = [
                'Parameter #1 ...$classes of attribute class PhpStaticAnalysis\Attributes\Mixin constructor expects string, int given.' => 7,
                'PHPDoc tag @mixin has invalid value (): Unexpected token "\n * ", expected type at offset 13 on line 2' => 8,
                'PHPDoc tag @mixin has invalid value (count($a)): Unexpected token "(", expected TOKEN_HORIZONTAL_WS at offset 29 on line 3' => 9,
                'Attribute class PhpStaticAnalysis\Attributes\Mixin does not have the method target.' => 11,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
