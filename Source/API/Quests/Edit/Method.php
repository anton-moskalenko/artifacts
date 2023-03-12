<?php

namespace Liloi\Artifacts\API\Quests\Edit;

use Liloi\API\Response;
use Liloi\Artifacts\API\Method as SuperMethod;
use Liloi\Artifacts\Engine\Domain\Quests\Manager;
use Liloi\Artifacts\Engine\Domain\Quests\Statuses;
use Liloi\Artifacts\Engine\Domain\Quests\Types;

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