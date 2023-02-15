<?php

namespace Liloi\Interstate\API\Ticket\Collection;

use Liloi\API\Response;
use Liloi\Interstate\API\Method as SuperMethod;
use Liloi\Interstate\Engine\Domain\Ticket\Manager;
use Liloi\Interstate\Engine\Domain\Ticket\Types;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection_artifact = Manager::loadCollection();

        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection_artifact,
            'types' => Types::$list
        ]));

        return $response;
    }
}