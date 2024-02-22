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

#[Mixin('ClassMixinAttribute')] // this is the proxied class
#[Mixin(
    'MyClass',
    'Another',
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
