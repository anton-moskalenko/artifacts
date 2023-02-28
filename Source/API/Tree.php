<?php

namespace Liloi\Nexus\API;

use Liloi\API\Manager;
use Liloi\API\Method;
use Liloi\Interstate\API\Tree as InterstateTree;

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
        $manager->add(new Method('Interstate.Ticket.Collection', '\Liloi\Nexus\API\Ticket\Collection\Method::execute'));
        $manager->add(new Method('Interstate.Ticket.Create', '\Liloi\Nexus\API\Ticket\Create\Method::execute'));
        $manager->add(new Method('Interstate.Ticket.Remove', '\Liloi\Nexus\API\Ticket\Remove\Method::execute'));
        $manager->add(new Method('Interstate.Ticket.Edit', '\Liloi\Nexus\API\Ticket\Edit\Method::execute'));
        $manager->add(new Method('Interstate.Ticket.Save', '\Liloi\Nexus\API\Ticket\Save\Method::execute'));

        $manager->add(new Method('Artifact.Map.Get', '\Liloi\Nexus\API\Map\Get\Method::execute'));
        $manager->add(new Method('Artifact.Map.Edit', '\Liloi\Nexus\API\Map\Edit\Method::execute'));
        $manager->add(new Method('Artifact.Map.Save', '\Liloi\Nexus\API\Map\Save\Method::execute'));

        InterstateTree::collect($manager);

        self::$manager = $manager;
    }

    public static function execute(): string
    {
        $response = self::$manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->getResponse();
    }
}