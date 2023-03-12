<?php

namespace Liloi\Artifacts\API\Quests\Create;

use Liloi\API\Response;
use Liloi\Artifacts\API\Method as SuperMethod;
use Liloi\Artifacts\Engine\Domain\Quests\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Manager::create();

        return new Response();
    }
}