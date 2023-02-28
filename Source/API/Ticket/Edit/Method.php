<?php

namespace Liloi\Nexus\API\Ticket\Edit;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Ticket\Manager;
use Liloi\Nexus\Engine\Domain\Ticket\Statuses;
use Liloi\Nexus\Engine\Domain\Ticket\Types;

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