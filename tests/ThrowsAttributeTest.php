<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class ThrowsAttributeTest extends BaseAttributeTestCase
{
    public function testMethodThrowsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Throws/MethodThrowsAttribute.php');
        $expectedErrors = [
            'Method test\PhpStaticAnalysis\PHPStanExtension\data\Throws\MethodThrowsAttribute::countNoErrorName() has Exception in PHPDoc @throws tag but it\'s not thrown.' => 72,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testFunctionThrowsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Throws/FunctionThrowsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodThrowsAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/Throws/InvalidMethodThrowsAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @throws has invalid value (): Unexpected token "\n ", expected type at offset 14 on line 2' => 11,
            'Method test\PhpStaticAnalysis\PHPStanExtension\data\Throws\InvalidMethodThrowsAttribute::getOtherNameLength() has string in PHPDoc @throws tag but it\'s not thrown.' => 16,
            'PHPDoc tag @throws with type string is not subtype of Throwable' => 16,
            'Attribute class PhpStaticAnalysis\Attributes\Throws does not have the property target.' => 22,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public static function getAdditionalConfigFiles(): array
    {
        return array_merge(
            parent::getAdditionalConfigFiles(),
            [
                __DIR__ . '/conf/throws.neon',
            ]
        );
    }
}
