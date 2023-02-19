<?php

namespace Liloi\Rune\API\Ticket\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Engine\Domain\Ticket\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Manager::create();

        return new Response();
    }
}