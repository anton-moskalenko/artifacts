<?php

namespace Liloi\Interstate\API\Ticket\Create;

use Liloi\API\Response;
use Liloi\Interstate\API\Method as SuperMethod;
use Liloi\Interstate\Engine\Domain\Ticket\Manager;
use Liloi\Interstate\Engine\Domain\Ticket\Statuses;

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