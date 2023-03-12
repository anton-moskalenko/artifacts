<?php

namespace Liloi\Artifacts\Engine\Domain\Quests;

class Types
{
    public const PROTOCOLS = 1;
    public const TRAINING = 2;
    public const PROJECTS = 3;
    public const SURVIVAL = 4;
    public const FAMILY = 5;
    public const EXAMS = 6;
    public const WEAKNESSES = 7;

    public static $list = [
        self::PROTOCOLS => 'Protocols',
        self::TRAINING => 'Training',
        self::PROJECTS => 'Projects',
        self::SURVIVAL => 'Survival',
        self::EXAMS => 'Exams',
        self::WEAKNESSES => 'Weaknesses',
        self::FAMILY => 'Family'
    ];
}