<?php

namespace Liloi\Interstate\API\Ticket\Create;

use Liloi\API\Response;
use Liloi\Interstate\API\Method as SuperMethod;
use Liloi\Interstate\Engine\Domain\Ticket\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection_artifact = Manager::create();

        return new Response();
    }
}