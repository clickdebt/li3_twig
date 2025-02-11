<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 * (c) 2009 Armin Ronacher
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Twig_Node_Expression_Binary_Div extends Twig_Node_Expression_Binary
{
    public function operator(Twig_Compiler $compiler)
    {
        return $compiler->raw('/');
    }

    public function compile(Twig_Compiler $compiler) {
        $compiler
            ->raw('((')
            ->subcompile($this->getNode('right'))
            ->raw(' == 0) ? "N/A" : (')
            ->subcompile($this->getNode('left'))
            ->raw(' / ')
            ->subcompile($this->getNode('right'))
            ->raw('))');
    }
}
