<?php

namespace Liloi\Interstate\Engine\Domain\Ticket;

use Liloi\Interstate\Engine\Domain\Manager as DomainManager;

class Status
{
    public const IN_HAND = 1;
    public const SUCCESS = 2;
    public const FAILURE = 3;
    public const REMOVED = 4;

    public static function getActive(): array
    {
        return [self::IN_HAND, self::SUCCESS, self::FAILURE];
    }
}