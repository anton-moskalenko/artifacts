<?php

namespace Liloi\Nexus\API;

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

        $manager->add(new Method('Nexus.Quests.Show', '\Liloi\Nexus\API\Quests\Show\Method::execute'));
        $manager->add(new Method('Nexus.Quests.Create', '\Liloi\Nexus\API\Quests\Create\Method::execute'));
        $manager->add(new Method('Nexus.Quests.Remove', '\Liloi\Nexus\API\Quests\Remove\Method::execute'));
        $manager->add(new Method('Nexus.Quests.Edit', '\Liloi\Nexus\API\Quests\Edit\Method::execute'));
        $manager->add(new Method('Nexus.Quests.Save', '\Liloi\Nexus\API\Quests\Save\Method::execute'));

        self::$manager = $manager;
    }

    public static function execute(): string
    {
        $response = self::$manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->getResponse();
    }
}