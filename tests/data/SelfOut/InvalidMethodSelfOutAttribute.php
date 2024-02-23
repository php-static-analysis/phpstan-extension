<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\SelfOut;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\SelfOut;
use PhpStaticAnalysis\Attributes\Template;

#[Template('TValue')]
class InvalidMethodSelfOutAttribute
{
    #[Template('TItemValue')]
    #[Param(item: 'TItemValue')]
    #[SelfOut(0)]
    public function add($item): void
    {
    }

    #[Template('TItemValue')]
    #[Param(item: 'TItemValue')]
    #[SelfOut('self<TValue|TItemValue>')]
    #[SelfOut('self<TValue|TItemValue>')]
    public function addMore($item): void
    {
    }

    #[SelfOut('self<TValue|TItemValue>')]
    public string $property;
}
