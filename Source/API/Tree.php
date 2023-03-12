<?php

namespace Liloi\Artifacts\API;

use Liloi\API\Manager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Tree
{
    static ?Manager $manager = null;

    public static function collect(): void
    {
        $manager = new Manager();

        // @todo: add automatic API method collect.

        $manager->add(new Method('Nexus.Quests.Show', '\Liloi\Artifacts\API\Quests\Show\Method::execute'));
        $manager->add(new Method('Nexus.Quests.Create', '\Liloi\Artifacts\API\Quests\Create\Method::execute'));
        $manager->add(new Method('Nexus.Quests.Remove', '\Liloi\Artifacts\API\Quests\Remove\Method::execute'));
        $manager->add(new Method('Nexus.Quests.Edit', '\Liloi\Artifacts\API\Quests\Edit\Method::execute'));
        $manager->add(new Method('Nexus.Quests.Save', '\Liloi\Artifacts\API\Quests\Save\Method::execute'));

        self::$manager = $manager;
    }

    public static function execute(): string
    {
        $response = self::$manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->getResponse();
    }
}