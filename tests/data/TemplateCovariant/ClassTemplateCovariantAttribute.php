<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\TemplateCovariant;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\TemplateCovariant;

class ClassTemplateCovariantAttribute
{
}
class ClassTemplateCovariantAttributeChild extends ClassTemplateCovariantAttribute
{
}

#[TemplateCovariant('TCreable')] // can only be used in covariant position
class Creator
{
    public function __construct(
        private string $className
    ) {
    }

    #[Returns('TCreable')]
    public function create()
    {
        /** @var TCreable $object */
        $object = new $this->className();
        return $object;
    }
}

#[Returns('Creator<ClassTemplateCovariantAttributeChild>')]
function getClassTemplateCovariantAttributeCreator(): Creator
{
    return new Creator(ClassTemplateCovariantAttributeChild::class);
}

#[Param(creator: 'Creator<ClassTemplateCovariantAttribute>')]
function someFunctionThatCreates(Creator $creator): void
{
    $creator->create();
}

someFunctionThatCreates(getClassTemplateCovariantAttributeCreator());
