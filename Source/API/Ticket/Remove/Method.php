<?php

namespace Liloi\Nexus\API\Ticket\Remove;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Ticket\Manager;
use Liloi\Nexus\Engine\Domain\Ticket\Statuses;

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