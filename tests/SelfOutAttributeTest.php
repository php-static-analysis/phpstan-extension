<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

class SelfOutAttributeTest extends BaseAttributeTestCase
{
    public function testMethodSelfOutAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/SelfOut/MethodSelfOutAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodSelfOutAttribute(): void
    {
        $errors = $this->analyse(__DIR__ . '/data/SelfOut/InvalidMethodSelfOutAttribute.php');

        if (self::getPhpStanVersion() < '2') {
            $expectedErrors = [
                'PHPDoc tag @phpstan-self-out has invalid value (): Unexpected token "\n ", expected type at offset 75' => 12,
                'Parameter #1 $type of attribute class PhpStaticAnalysis\Attributes\SelfOut constructor expects string, int given.' => 14,
                'Attribute class PhpStaticAnalysis\Attributes\SelfOut is not repeatable but is already present above the method.' => 22,
                'Attribute class PhpStaticAnalysis\Attributes\SelfOut does not have the property target.' => 27,
            ];
        } else {
            $expectedErrors = [
                'Parameter #1 $type of attribute class PhpStaticAnalysis\Attributes\SelfOut constructor expects string, int given.' => 14,
                'PHPDoc tag @phpstan-self-out has invalid value (): Unexpected token "\n ", expected type at offset 75 on line 4' => 15,
                'Attribute class PhpStaticAnalysis\Attributes\SelfOut is not repeatable but is already present above the method.' => 22,
                'Attribute class PhpStaticAnalysis\Attributes\SelfOut does not have the property target.' => 27,
            ];
        }

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
