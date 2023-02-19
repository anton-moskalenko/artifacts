<?php

namespace Liloi\Rune\API;

use Liloi\API\Manager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Tree
{
    static ?Manager $manager = null;

    static public function collect(): void
    {
        $manager = new Manager();

        // @todo: add automatic API method collect.
        $manager->add(new Method('Interstate.Ticket.Collection', '\Liloi\Rune\API\Ticket\Collection\Method::execute'));
        $manager->add(new Method('Interstate.Ticket.Create', '\Liloi\Rune\API\Ticket\Create\Method::execute'));
        $manager->add(new Method('Interstate.Ticket.Remove', '\Liloi\Rune\API\Ticket\Remove\Method::execute'));
        $manager->add(new Method('Interstate.Ticket.Edit', '\Liloi\Rune\API\Ticket\Edit\Method::execute'));
        $manager->add(new Method('Interstate.Ticket.Save', '\Liloi\Rune\API\Ticket\Save\Method::execute'));

        $manager->add(new Method('Artifact.Map.Get', '\Liloi\Rune\API\Map\Get\Method::execute'));
        $manager->add(new Method('Artifact.Map.Edit', '\Liloi\Rune\API\Map\Edit\Method::execute'));
        $manager->add(new Method('Artifact.Map.Save', '\Liloi\Rune\API\Map\Save\Method::execute'));

        self::$manager = $manager;
    }

    public static function execute(): string
    {
        $response = self::$manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->getResponse();
    }
}