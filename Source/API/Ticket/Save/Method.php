<?php

namespace Liloi\Nexus\API\Ticket\Save;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Ticket\Manager;
use Liloi\Nexus\Engine\Domain\Ticket\Statuses;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));

        $entity->setUid(self::getParameter('uid'));
        $entity->setMajoro(self::getParameter('majoro'));
        $entity->setMinoro(self::getParameter('minoro'));
        $entity->setAtomico(self::getParameter('atomico'));
        $entity->setTitle(self::getParameter('title'));
        $entity->setURL(self::getParameter('url'));
        $entity->setStart(self::getParameter('start'));
        $entity->setFinish(self::getParameter('finish'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setType(self::getParameter('type'));
        $entity->setData(self::getParameter('data'));

        $entity->save();

        return new Response();
    }
}