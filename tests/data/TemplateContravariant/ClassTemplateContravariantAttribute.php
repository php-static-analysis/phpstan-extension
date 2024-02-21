<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateContravariant;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\TemplateContravariant;

class ClassTemplateContravariantAttribute
{
}
class ClassTemplateContravariantAttributeChild extends ClassTemplateContravariantAttribute
{
}

#[TemplateContravariant('TConsumable')] // can only be used in contra-variant position
class Consumer
{
    #[Param(consumable: 'TConsumable')]
    public function consume($consumable): void
    {
    }
}

#[Returns('Consumer<ClassTemplateContravariantAttribute>')]
function getClassTemplateContravariantAttributeConsumer(): Consumer
{
    return new Consumer();
}

#[Param(consumer: 'Consumer<ClassTemplateContravariantAttributeChild>')]
function someFunctionThatConsumes(Consumer $consumer): void
{
    $consumer->consume(new ClassTemplateContravariantAttributeChild());
}

someFunctionThatConsumes(getClassTemplateContravariantAttributeConsumer());
