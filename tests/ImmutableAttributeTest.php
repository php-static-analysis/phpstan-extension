<?php


use test\PhpStaticAnalysis\PHPStanExtension\BaseAttributeTestCase;

class ImmutableAttributeTest extends BaseAttributeTestCase
{
    public function testClassImmutableAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Immutable/ClassImmutableAttribute.php');
        $expectedErrors = [
        ];

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

        $expectedErrors = [
            'Attribute class PhpStaticAnalysis\Attributes\Immutable is not repeatable but is already present above the class.' => 10,
            'Attribute class PhpStaticAnalysis\Attributes\Immutable does not have the property target.' => 13,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
