<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Mixin;

use PhpStaticAnalysis\Attributes\Mixin;

class ClassMixinAttribute
{
    public function proxied(): void
    {
    }
}

class MyClass
{
}

class Another
{
}

#[Mixin(ClassMixinAttribute::class)] // this is the proxied class
#[Mixin(
    MyClass::class,
    Another::class,
)]
class ClassMixinAttributeProxy
{
    public function __call(string $name, mixed ...$arguments): void
    {
        (new ClassMixinAttribute())->$name(...$arguments);
    }
}

$proxy = new ClassMixinAttributeProxy();
$proxy->proxied();
