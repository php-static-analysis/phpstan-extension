<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class IsReadOnlyAttributeTest extends BaseAttributeTestCase
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
            'Attribute class PhpStaticAnalysis\Attributes\IsReadOnly constructor invoked with 1 parameter, 0 required.' => 9,
            'Attribute class PhpStaticAnalysis\Attributes\IsReadOnly is not repeatable but is already present above the property.' => 13,
            'Attribute class PhpStaticAnalysis\Attributes\IsReadOnly does not have the method target.' => 16,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public static function getAdditionalConfigFiles(): array
    {
        if (self::getPhpStanVersion() < '2') {
            return array_merge(
                parent::getAdditionalConfigFiles(),
                [
                    __DIR__ . '/conf/readonly.neon',
                ]
            );
        } else {
            return parent::getAdditionalConfigFiles();
        }
    }
}
