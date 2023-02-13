<?php

namespace Liloi\Interstate\API\Ticket\Collection;

use Liloi\API\Response;
use Liloi\Artifact\API\Method as SuperMethod;
use Liloi\Artifact\Engine\Domain\Artifact\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_rune = self::getParameter('key_rune');
        $collection_artifact = Manager::loadCollection($key_rune);

        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection_artifact
        ]));

        return $response;
    }
}