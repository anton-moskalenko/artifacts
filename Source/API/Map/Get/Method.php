<?php

namespace Liloi\Nexus\API\Map\Get;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Map\Entity;
use Liloi\Nexus\Engine\Domain\Ticket\Manager as TicketManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $map = Entity::getCurrent();

        $collection = TicketManager::loadByRID($map->getRID());

        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'map' => $map,
            'tickets' => $collection
        ]));

        return $response;
    }
}