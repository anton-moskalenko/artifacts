<?php

namespace Liloi\Rune\Engine\Domain\Ticket;

class Types
{
    public const HOBBIES = 1;
    public const TRAINING = 2;
    public const FAMILY = 3;
    public const PROJECTS = 4;
    public const EXAMS = 5;
    public const ARTIFACTS = 6;
    public const HORCRUXES = 7;

    public static $list = [
        self::HOBBIES => 'Hobbies',
        self::TRAINING => 'Training',
        self::FAMILY => 'Family',
        self::PROJECTS => 'Projects',
        self::EXAMS => 'Exams',
        self::ARTIFACTS => 'Artifacts',
        self::HORCRUXES => 'Horcruxes',
    ];
}