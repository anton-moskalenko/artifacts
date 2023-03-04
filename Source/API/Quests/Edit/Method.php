<?php

namespace Liloi\Nexus\API\Quests\Edit;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Quests\Manager;
use Liloi\Nexus\Engine\Domain\Quests\Statuses;
use Liloi\Nexus\Engine\Domain\Quests\Types;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));
        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => Statuses::$list,
            'types' => Types::$list
        ]));

        return $response;
    }
}