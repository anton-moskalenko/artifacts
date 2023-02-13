<?php

namespace Liloi\Interstate\API\Ticket\Save;

use Liloi\API\Response;
use Liloi\Interstate\API\Method as SuperMethod;
use Liloi\Interstate\Engine\Domain\Ticket\Manager;
use Liloi\Interstate\Engine\Domain\Ticket\Statuses;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setStart(self::getParameter('start'));
        $entity->setFinish(self::getParameter('finish'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setType(self::getParameter('type'));
        $entity->setData(self::getParameter('data'));

        $entity->save();

        return new Response();
    }
}