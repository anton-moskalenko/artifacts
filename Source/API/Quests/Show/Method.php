<?php

namespace Liloi\Artifacts\API\Quests\Show;

use Liloi\API\Response;
use Liloi\Artifacts\API\Method as SuperMethod;
use Liloi\Artifacts\Engine\Domain\Quests\Manager as QuestsManager;
use Liloi\Artifacts\Engine\Domain\Quests\Types;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'group' => QuestsManager::group(),
            'collection' => QuestsManager::loadCollection(),
            'types' => Types::$list
        ]));

        return $response;
    }
}