<?php

namespace Liloi\Nexus\API\Map\Edit;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Map\Manager;
use Liloi\Nexus\Engine\Domain\Map\Entity;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $map = Entity::getCurrent();

        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'map' => $map
        ]));

        return $response;
    }
}