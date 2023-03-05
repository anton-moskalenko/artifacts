<?php

namespace Liloi\Nexus\Engine\Domain\Quests;

class Types
{
    public const PROTOCOLS = 1;
    public const TRAINING = 2;
    public const PROJECTS = 3;

    public static $list = [
        self::PROTOCOLS => 'Protocols',
        self::TRAINING => 'Training',
        self::PROJECTS => 'Projects',
    ];
}