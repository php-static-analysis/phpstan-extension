<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

final class SelfOutAttributeTest extends BaseAttributeTestCase
{
    public function testMethodSelfOutAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/SelfOut/MethodSelfOutAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodSelfOutAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/SelfOut/InvalidMethodSelfOutAttribute.php');

        $expectedErrors = [
            'PHPDoc tag @phpstan-self-out has invalid value (): Unexpected token "\n ", expected type at offset 75 on line 4' => 15,
            'Attribute class PhpStaticAnalysis\Attributes\SelfOut does not have the property target.' => 27,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
