<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\DefineType;

use PhpStaticAnalysis\Attributes\DefineType;
use PhpStaticAnalysis\Attributes\Param;

#[DefineType(UserAddress: 'array{street: string, city: string, zip: string}')] // this is an alias of the listed type
#[DefineType('UserName array{firstName: string, lastName: string}')]
#[DefineType(
    StringArray: 'string[]',
    IntArray: 'int[]',
)]
class ClassDefineTypeAttribute
{
    #[Param(address: 'UserAddress')]
    public function getZip($address): string
    {
        return $address['zip'];
    }
}
