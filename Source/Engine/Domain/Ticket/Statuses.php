<?php

namespace Liloi\Nexus\Engine\Domain\Ticket;

class Statuses
{
    public const IN_HAND = 1;
    public const SUCCESS = 2;
    public const FAILURE = 3;
    public const REMOVED = 4;
    public const TODO = 5;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::SUCCESS => 'Success',
        self::FAILURE => 'Failure',
        self::REMOVED => 'Removed',
    ];

    public static function getActive(): array
    {
        return [self::TODO, self::IN_HAND, self::SUCCESS, self::FAILURE];
    }
}