<?php

namespace Liloi\Nexus\API\Quests\Show;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Map\Entity;
use Liloi\Nexus\Engine\Domain\Quests\Manager as QuestsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => QuestsManager::loadCollection()
        ]));

        return $response;
    }
}