<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class IsReadOnlyAttributeTest extends BaseAttributeTestCase
{
    public function testPropertyTypeAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/IsReadOnly/PropertyIsReadOnlyAttribute.php');
        $expectedErrors = [
            '@readonly property test\PhpStaticAnalysis\PHPStanExtension\data\IsReadOnly\PropertyIsReadOnlyAttribute::$name is assigned outside of its declaring class.' => 19,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testInvalidPropertyIsReadOnlyAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/IsReadOnly/InvalidPropertyIsReadOnlyAttribute.php');

        $expectedErrors = [
            'Attribute class PhpStaticAnalysis\Attributes\IsReadOnly does not have the method target.' => 16,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
