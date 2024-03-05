<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\ImportType;

use PhpStaticAnalysis\Attributes\DefineType;
use PhpStaticAnalysis\Attributes\ImportType;
use PhpStaticAnalysis\Attributes\Param;

#[ImportType(UserAddress: TypeClass::class)] // we import this alias from another class
#[ImportType('UserName from TypeClass')]
#[ImportType(
    StringArray: 'TypeClass',
    IntArray: TypeClass::class,
)]
class ClassImportTypeAttribute
{
    #[Param(address: 'UserAddress')]
    public function getZip($address): string
    {
        return $address['zip'];
    }
}

#[DefineType(UserAddress: 'array{street: string, city: string, zip: string}')]
#[DefineType('UserName array{firstName: string, lastName: string}')]
#[DefineType(StringArray: 'string[]')]
#[DefineType(IntArray: 'int[]')]
class TypeClass
{
}
