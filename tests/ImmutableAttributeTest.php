<?php


use test\PhpStaticAnalysis\PHPStanExtension\BaseAttributeTestCase;

class ImmutableAttributeTest extends BaseAttributeTestCase
{
    public function testClassImmutableAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Immutable/ClassImmutableAttribute.php');
        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [];
        } else {
            $expectedErrors = [
                '@readonly property cannot have a default value.' => 10,
                '@readonly property test\PhpStaticAnalysis\PHPStanExtension\data\Immutable\ClassImmutableAttribute::$name is assigned outside of its declaring class.' => 14,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testTraitImmutableAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Immutable/TraitImmutableAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceImmutableAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Immutable/InterfaceImmutableAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassImmutableAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Immutable/InvalidClassImmutableAttribute.php');

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'Attribute class PhpStaticAnalysis\Attributes\Immutable is not repeatable but is already present above the class.' => 10,
                'Attribute class PhpStaticAnalysis\Attributes\Immutable does not have the property target.' => 13,
            ];
        } else {
            $expectedErrors = [
                'Attribute class PhpStaticAnalysis\Attributes\Immutable is not repeatable but is already present above the class.' => 10,
                'Attribute class PhpStaticAnalysis\Attributes\Immutable does not have the property target.' => 13,
                '@readonly property cannot have a default value.' => 14,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
