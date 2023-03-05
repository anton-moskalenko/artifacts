<?php

namespace Liloi\Nexus\Engine\Domain\Quests;

class Types
{
    public const PROTOCOLS = 1;
    public const TRAINING = 2;
    public const PROJECTS = 3;
    public const HOBBIES = 4;
    public const FAMILY = 5;
    public const EXAMS = 6;
    public const MYTHS = 7;

    public static $list = [
        self::PROTOCOLS => 'Protocols',
        self::TRAINING => 'Training',
        self::PROJECTS => 'Projects',
        self::HOBBIES => 'Hobbies',
        self::FAMILY => 'Family',
        self::EXAMS => 'Exams',
        self::MYTHS => 'Myths'
    ];
}