<?php

namespace Liloi\Nexus\API\Ticket\Create;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Ticket\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Manager::create();

        return new Response();
    }
}