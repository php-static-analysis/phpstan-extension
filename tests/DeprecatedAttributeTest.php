<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class DeprecatedAttributeTest extends BaseAttributeTestCase
{
    public function testClassDeprecatedAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Deprecated/ClassDeprecatedAttribute.php');
        $expectedErrors = [
            'Instantiation of deprecated class test\PhpStaticAnalysis\PHPStanExtension\data\Deprecated\ClassDeprecatedAttribute.' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testTraitDeprecatedAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Deprecated/TraitDeprecatedAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceDeprecatedAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Deprecated/InterfaceDeprecatedAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodDeprecatedAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Deprecated/MethodDeprecatedAttribute.php');
        $expectedErrors = [
            'Call to deprecated method returnDeprecated() of class test\PhpStaticAnalysis\PHPStanExtension\data\Deprecated\MethodDeprecatedAttribute.' => 31,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testFunctionDeprecatedAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Deprecated/FunctionDeprecatedAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testPropertyDeprecatedAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Deprecated/PropertyDeprecatedAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodDeprecatedAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Deprecated/InvalidMethodDeprecatedAttribute.php');

        $expectedErrors = [
            'Attribute class PhpStaticAnalysis\Attributes\Deprecated does not have the parameter target.' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public static function getAdditionalConfigFiles(): array
    {
        return array_merge(
            parent::getAdditionalConfigFiles(),
            [
                __DIR__ . '/conf/deprecated.neon',
            ]
        );
    }
}
