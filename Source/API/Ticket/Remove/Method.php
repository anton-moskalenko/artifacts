<?php

namespace Liloi\Rune\API\Ticket\Remove;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Engine\Domain\Ticket\Manager;
use Liloi\Rune\Engine\Domain\Ticket\Statuses;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));
        $entity->setStatus(Statuses::REMOVED);
        $entity->save();

        return new Response();
    }
}