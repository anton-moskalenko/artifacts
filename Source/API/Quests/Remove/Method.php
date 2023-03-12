<?php

namespace Liloi\Artifacts\API\Quests\Remove;

use Liloi\API\Response;
use Liloi\Artifacts\API\Method as SuperMethod;
use Liloi\Artifacts\Engine\Domain\Quests\Manager;
use Liloi\Artifacts\Engine\Domain\Quests\Statuses;

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