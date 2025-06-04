<?php

declare(strict_types=1);

namespace PhpStaticAnalysis\PHPStanExtension\Parser;

use PhpParser\Node\Stmt;
use PhpParser\NodeTraverser;
use PHPStan\Parser\Parser;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\NodeVisitor\AttributeNodeVisitor;
use Webmozart\Assert\Assert;

final class AttributeParser implements Parser
{
    public function __construct(
        private Parser $parser
    ) {
    }

    public function parseFile(string $file): array
    {
        $ast = $this->parser->parseFile($file);
        return $this->traverseAst($ast);
    }

    public function parseString(string $sourceCode): array
    {
        $ast = $this->parser->parseString($sourceCode);
        return $this->traverseAst($ast);
    }

    #[Param(ast: 'Stmt[]')]
    #[Returns('Stmt[]')]
    private function traverseAst(array $ast): array
    {
        $traverser = new NodeTraverser();
        $nodeVisitor = new AttributeNodeVisitor(AttributeNodeVisitor::TOOL_PHPSTAN);
        $traverser->addVisitor($nodeVisitor);

        $ast = $traverser->traverse($ast);
        Assert::allIsInstanceOf($ast, Stmt::class);
        return $ast;
    }
}
