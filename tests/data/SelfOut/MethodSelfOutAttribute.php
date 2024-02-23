<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\SelfOut;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\SelfOut;
use PhpStaticAnalysis\Attributes\Template;

#[Template('TValue')]
class MethodSelfOutAttribute
{
    #[Template('TItemValue')]
    #[Param(item: 'TItemValue')]
    #[SelfOut('self<TValue|TItemValue>')] // we specify the new type
    public function add($item): void
    {
    }

    /**
     * @deprecated
     */
    #[Template('TItemValue')]
    #[Param(item: 'TItemValue')]
    #[SelfOut('self<TValue|TItemValue>')]
    public function addMore($item): void
    {
    }

    /**
     * @self-out self<TValue>
     */
    #[Template('TItemValue')]
    #[Param(item: 'TItemValue')]
    #[SelfOut('self<TValue|TItemValue>')]
    public function addEvenMore($item): void
    {
    }

    /**
     * @self-out self<TValue|TItemValue>
     */
    #[Template('TItemValue')]
    #[Param(item: 'TItemValue')]
    public function addMoreAndMore($item): void
    {
    }
}
