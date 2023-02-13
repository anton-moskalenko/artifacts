<?php

namespace Liloi\Interstate\API\Ticket\Edit;

use Liloi\API\Response;
use Liloi\Interstate\API\Method as SuperMethod;
use Liloi\Interstate\Engine\Domain\Ticket\Manager;
use Liloi\Interstate\Engine\Domain\Ticket\Statuses;
use Liloi\Interstate\Engine\Domain\Ticket\Types;

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