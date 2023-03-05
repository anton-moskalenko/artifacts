<?php

namespace Liloi\Nexus\API\Quests\Save;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Quests\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setUrl(self::getParameter('url'));
        $entity->setStart(self::getParameter('start'));
        $entity->setFinish(self::getParameter('finish'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setType(self::getParameter('type'));
        $entity->setData(self::getParameter('data'));

        $entity->save();

        return new Response();
    }
}