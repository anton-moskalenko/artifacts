<?php

namespace Liloi\Interstate\Engine\Domain\Ticket;

class Status
{
    public const IN_HAND = 1;
    public const SUCCESS = 2;
    public const FAILURE = 3;
    public const REMOVED = 4;

    public static $list = [
        self::IN_HAND => 'In hand',
        self::SUCCESS => 'Success',
        self::FAILURE => 'Failure',
        self::REMOVED => 'Removed',
    ];

    public static function getActive(): array
    {
        return [self::IN_HAND, self::SUCCESS, self::FAILURE];
    }
}