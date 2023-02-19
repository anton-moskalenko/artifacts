<?php

namespace Liloi\Rune\API\Map\Get;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Engine\Domain\Map\Manager;
use Liloi\Rune\Engine\Domain\Map\Entity;

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