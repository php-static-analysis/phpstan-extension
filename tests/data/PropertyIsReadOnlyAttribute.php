<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data;

use PhpStaticAnalysis\Attributes\IsReadOnly;

class PropertyIsReadOnlyAttribute
{
    #[IsReadOnly]
    public string $name;

    public function __construct()
    {
        $this->name = 'Mike';
    }
}

$p = new PropertyIsReadOnlyAttribute();
$p->name = 'John';
