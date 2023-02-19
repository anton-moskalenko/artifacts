<?php

namespace Liloi\Rune\Engine;

use Liloi\Rune\API\Tree;

/**
 * @inheritDoc
 */
class Application extends Conceptual
{
    /**
     * @inheritDoc
     */
    public function compile(): string
    {
        if(isset($_POST['method']))
        {
            return Tree::execute();
        }

        return $this->render(__DIR__ . '/Layout.tpl', [

        ]);
    }
}