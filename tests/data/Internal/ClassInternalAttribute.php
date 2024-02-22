<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\Internal;

use PhpStaticAnalysis\Attributes\Internal;

#[Internal('newNamespace\test')] // Can only be accessed from the current namespace
class ClassInternalAttribute
{
    #[Internal]
    public function myFunction(): void
    {
    }
}

namespace newNamespace\test;

class newClass
{
    public function newFunction(): void
    {
        $class = new \test\PhpStaticAnalysis\PHPStanExtension\data\Internal\ClassInternalAttribute();

        $class->myFunction();
    }
}

namespace newNamespace\other;

class otherClass
{
    public function otherFunction(): void
    {
        $class = new \test\PhpStaticAnalysis\PHPStanExtension\data\Internal\ClassInternalAttribute();

        $class->myFunction();
    }
}
