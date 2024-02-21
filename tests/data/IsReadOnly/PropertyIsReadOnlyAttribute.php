<?php

namespace test\PhpStaticAnalysis\PHPStanExtension\data\IsReadOnly;

use PhpStaticAnalysis\Attributes\IsReadOnly;

class PropertyIsReadOnlyAttribute
{
    #[IsReadOnly] // cannot be written to
    public string $name;

    public function __construct()
    {
        $this->name = 'Mike';
    }
}

$p = new PropertyIsReadOnlyAttribute();
$p->name = 'John';
