<?php

namespace DWWE\Doctrine\ORM\Query;

/**
 * FunctionClass to enable random sorting
 *
 * @link https://gist.github.com/Ocramius/919465
 * @author Marco Pivetta
 */
use \Doctrine\ORM\Query\AST\Functions\FunctionNode;
use \Doctrine\ORM\Query\Lexer;

/**
 * RandFunction ::= "RAND" "(" ")"
 */
class RandFunction extends FunctionNode
{

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'RAND()';
    }
}
