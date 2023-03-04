<?php

namespace Liloi\Nexus\API\Quests\Remove;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Engine\Domain\Quests\Manager;
use Liloi\Nexus\Engine\Domain\Quests\Statuses;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));
        $entity->setStatus(Statuses::FAILURE);
        $entity->save();

        return new Response();
    }
}