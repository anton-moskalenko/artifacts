<?php

namespace Liloi\Nexus\API\Ticket\Collection;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Ticket\Manager;
use Liloi\Nexus\Engine\Domain\Ticket\Types;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $dt = self::getParameter('dt');
        $collection_artifact = Manager::loadCollection($dt);

        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection_artifact,
            'group' => $collection_artifact->group(),
            'types' => Types::$list
        ]));

        return $response;
    }
}